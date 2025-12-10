<?php echo view_render_event('bagisto.shop.layout.footer.before'); ?>


<!--
    The category repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
-->
<?php $themeCustomizationRepository = app('Webkul\Theme\Repositories\ThemeCustomizationRepository'); ?>

<!--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
-->
<?php
    $channel = core()->getCurrentChannel();

    $customization = $themeCustomizationRepository->findOneWhere([
        'type'       => 'footer_links',
        'status'     => 1,
        'theme_code' => $channel->theme,
        'channel_id' => $channel->id,
    ]);
?>

<footer class="mt-9 bg-lightOrange max-sm:mt-10">
    <div class="flex justify-between gap-x-6 gap-y-8 p-[60px] max-1060:flex-col-reverse max-md:gap-5 max-md:p-8 max-sm:px-4 max-sm:py-5">
        

        <?php echo view_render_event('bagisto.shop.layout.footer.newsletter_subscription.before'); ?>


        

        <?php echo view_render_event('bagisto.shop.layout.footer.newsletter_subscription.after'); ?>

    </div>

    <div class="flex justify-between bg-[#F1EADF] px-[60px] py-3.5 max-md:justify-center max-sm:px-5">
        <?php echo view_render_event('bagisto.shop.layout.footer.footer_text.before'); ?>


        <p class="text-sm text-zinc-600 max-md:text-center">
            Payment Process & Inventory Management Testing - <?php echo e(date('Y')); ?>

        </p>

        <?php echo view_render_event('bagisto.shop.layout.footer.footer_text.after'); ?>

    </div>
</footer>

<?php echo view_render_event('bagisto.shop.layout.footer.after'); ?>

<?php /**PATH C:\D\xampp\htdocs\TTTD_KTPM_Clone2\packages\Webkul\Shop\src/resources/views/components/layouts/footer/index.blade.php ENDPATH**/ ?>