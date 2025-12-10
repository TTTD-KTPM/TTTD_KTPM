<?php

namespace Webkul\Admin\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\OrderRepository;

class Dashboard
{
    /**
     * Start date.
     *
     * @var \Carbon\Carbon
     */
    protected $startDate;

    /**
     * End date.
     *
     * @var \Carbon\Carbon
     */
    protected $endDate;

    /**
     * Create a helper instance.
     *
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected OrderRepository $orderRepository,
        protected OrderItemRepository $orderItemRepository,
        protected InvoiceRepository $invoiceRepository,
        protected ProductRepository $productRepository,
        protected ProductInventoryRepository $productInventoryRepository
    ) {
        $this->startDate = $this->getStartDate();

        $this->endDate = $this->getEndDate();
    }

    /**
     * Get start date.
     *
     * @return \Carbon\Carbon
     */
    public function getStartDate()
    {
        if ($startDate = request('start')) {
            return Carbon::createFromTimeString($startDate.' 00:00:01');
        }

        return Carbon::now()->startOfMonth();
    }

    /**
     * Get end date.
     *
     * @return \Carbon\Carbon
     */
    public function getEndDate()
    {
        if ($endDate = request('end')) {
            return Carbon::createFromTimeString($endDate.' 23:59:59');
        }

        return Carbon::now()->endOfMonth();
    }

    /**
     * Get over all stats.
     *
     * @return array
     */
    public function getOverAllStats()
    {
        return [
            'total_customers' => [
                'previous' => $previous = $this->getTotalCustomers($this->startDate, $this->endDate),
                'current'  => $current = $this->getTotalCustomers(),
                'progress' => $this->getPercentageChange($previous, $current),
            ],
            'total_orders' => [
                'previous' => $previous = $this->getTotalOrders($this->startDate, $this->endDate),
                'current'  => $current = $this->getTotalOrders(),
                'progress' => $this->getPercentageChange($previous, $current),
            ],
            'total_sales' => [
                'previous'       => $previous = $this->getTotalSales($this->startDate, $this->endDate),
                'current'        => $current = $this->getTotalSales(),
                'formatted_total' => core()->formatBasePrice($current),
                'progress'       => $this->getPercentageChange($previous, $current),
            ],
            'avg_sales' => [
                'previous'       => $previous = $this->getAverageSales($this->startDate, $this->endDate),
                'current'        => $current = $this->getAverageSales(),
                'formatted_total' => core()->formatBasePrice($current),
                'progress'       => $this->getPercentageChange($previous, $current),
            ],
        ];
    }

    /**
     * Get today stats.
     *
     * @return array
     */
    public function getTodayStats()
    {
        $startDate = Carbon::now()->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        return [
            'total_customers' => [
                'previous' => $previous = $this->getTotalCustomers($startDate, $endDate),
                'current'  => $current = $this->getTotalCustomers(),
                'progress' => $this->getPercentageChange($previous, $current),
            ],
            'total_orders' => [
                'previous' => $previous = $this->getTotalOrders($startDate, $endDate),
                'current'  => $current = $this->getTotalOrders(),
                'progress' => $this->getPercentageChange($previous, $current),
            ],
            'total_sales' => [
                'previous'       => $previous = $this->getTotalSales($startDate, $endDate),
                'current'        => $current = $this->getTotalSales(),
                'formatted_total' => core()->formatBasePrice($current),
                'progress'       => $this->getPercentageChange($previous, $current),
            ],
            'avg_sales' => [
                'previous'       => $previous = $this->getAverageSales($startDate, $endDate),
                'current'        => $current = $this->getAverageSales(),
                'formatted_total' => core()->formatBasePrice($current),
                'progress'       => $this->getPercentageChange($previous, $current),
            ],
        ];
    }

    /**
     * Get stock threshold products.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getStockThresholdProducts()
    {
        return $this->productInventoryRepository->getModel()
            ->leftJoin('products', 'product_inventories.product_id', '=', 'products.id')
            ->select(DB::raw('SUM(qty) as total_qty'), 'product_inventories.product_id', 'products.sku')
            ->groupBy('product_id')
            ->havingRaw('SUM(qty) <= 10')
            ->limit(5)
            ->get();
    }

    /**
     * Get sales stats.
     *
     * @return array
     */
    public function getSalesStats()
    {
        $startDate = $this->startDate;
        $endDate = $this->endDate;

        $invoices = $this->invoiceRepository->scopeQuery(function ($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })->all();

        $statistics = [
            'label' => [],
            'sales' => [],
        ];

        foreach ($invoices as $invoice) {
            $date = $invoice->created_at->format('d M');

            if (! in_array($date, $statistics['label'])) {
                $statistics['label'][] = $date;
                $statistics['sales'][] = $invoice->base_grand_total;
            } else {
                $index = array_search($date, $statistics['label']);
                $statistics['sales'][$index] += $invoice->base_grand_total;
            }
        }

        return $statistics;
    }

    /**
     * Get visitor stats.
     *
     * @return array
     */
    public function getVisitorStats()
    {
        return [
            'label'    => [],
            'visitors' => [],
        ];
    }

    /**
     * Get top selling products.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTopSellingProducts()
    {
        return $this->orderItemRepository->getModel()
            ->select(DB::raw('SUM(qty_ordered) as total_qty_ordered'), 'name')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->whereNull('parent_id')
            ->groupBy('product_id')
            ->orderBy('total_qty_ordered', 'DESC')
            ->limit(5)
            ->get();
    }

    /**
     * Get top customers.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTopCustomers()
    {
        return $this->orderRepository->getModel()
            ->select(DB::raw('SUM(base_grand_total) as total'), 'customer_email', 'customer_first_name', 'customer_last_name')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->whereNotNull('customer_id')
            ->groupBy('customer_id')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get();
    }

    /**
     * Get total customers.
     *
     * @param  \Carbon\Carbon|null  $startDate
     * @param  \Carbon\Carbon|null  $endDate
     * @return int
     */
    public function getTotalCustomers($startDate = null, $endDate = null)
    {
        return $this->customerRepository->scopeQuery(function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                return $query->whereBetween('created_at', [$startDate, $endDate]);
            }

            return $query;
        })->count();
    }

    /**
     * Get total orders.
     *
     * @param  \Carbon\Carbon|null  $startDate
     * @param  \Carbon\Carbon|null  $endDate
     * @return int
     */
    public function getTotalOrders($startDate = null, $endDate = null)
    {
        return $this->orderRepository->scopeQuery(function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                return $query->whereBetween('created_at', [$startDate, $endDate]);
            }

            return $query;
        })->count();
    }

    /**
     * Get total sales.
     *
     * @param  \Carbon\Carbon|null  $startDate
     * @param  \Carbon\Carbon|null  $endDate
     * @return float
     */
    public function getTotalSales($startDate = null, $endDate = null)
    {
        return $this->orderRepository->scopeQuery(function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                return $query->whereBetween('created_at', [$startDate, $endDate]);
            }

            return $query;
        })->sum('base_grand_total');
    }

    /**
     * Get average sales.
     *
     * @param  \Carbon\Carbon|null  $startDate
     * @param  \Carbon\Carbon|null  $endDate
     * @return float
     */
    public function getAverageSales($startDate = null, $endDate = null)
    {
        $count = $this->getTotalOrders($startDate, $endDate);

        if (! $count) {
            return 0;
        }

        return $this->getTotalSales($startDate, $endDate) / $count;
    }

    /**
     * Get percentage change.
     *
     * @param  float  $previous
     * @param  float  $current
     * @return float
     */
    public function getPercentageChange($previous, $current)
    {
        if (! $previous) {
            return $current ? 100 : 0;
        }

        return ($current - $previous) / $previous * 100;
    }
}
