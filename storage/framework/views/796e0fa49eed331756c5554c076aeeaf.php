<v-charts-bar <?php echo e($attributes); ?>></v-charts-bar>

<?php if (! $__env->hasRenderedOnce('5cb5440a-28a7-444b-a76c-1edc2e37a1de')): $__env->markAsRenderedOnce('5cb5440a-28a7-444b-a76c-1edc2e37a1de');
$__env->startPush('scripts'); ?>
    <!-- SEO Vue Component Template -->
    <script
        type="text/x-template"
        id="v-charts-bar-template"
    >
        <canvas
            :id="$.uid + '_chart'"
            class="flex w-full items-end"
            :style="'aspect-ratio:' + aspectRatio + '/1'"
            style=""
        ></canvas>
    </script>

    <script type="module">
        app.component('v-charts-bar', {
            template: '#v-charts-bar-template',

            props: {
                labels: {
                    type: Array, 
                    default: [],
                },

                datasets: {
                    type: Array, 
                    default: true,
                },

                aspectRatio: {
                    type: Number, 
                    default: 3.23,
                },
            },

            data() {
                return {
                    chart: undefined,
                }
            },

            mounted() {
                this.prepare();
            },

            methods: {
                prepare() {
                    if (this.chart) {
                        this.chart.destroy();
                    }

                    this.chart = new Chart(document.getElementById(this.$.uid + '_chart'), {
                        type: 'bar',
                        
                        data: {
                            labels: this.labels,

                            datasets: this.datasets,
                        },
                
                        options: {
                            aspectRatio: this.aspectRatio,
                            
                            plugins: {
                                legend: {
                                    display: false
                                },
                            },
                            
                            scales: {
                                x: {
                                    beginAtZero: true,

                                    border: {
                                        dash: [8, 4],
                                    }
                                },

                                y: {
                                    beginAtZero: true,
                                    border: {
                                        dash: [8, 4],
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\D\xampp\htdocs\TTTD_KTPM_Clone2\packages\Webkul\Admin\src/resources/views/components/charts/bar.blade.php ENDPATH**/ ?>