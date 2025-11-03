<!DOCTYPE html>
<html
    lang="<?php echo e(app()->getLocale()); ?>"
    dir="<?php echo e(in_array(app()->getLocale(), ['ar', 'fa', 'he']) ? 'rtl' : 'ltr'); ?>"
>
    <head>
        <title>
            <?php echo app('translator')->get('installer::app.installer.index.title'); ?>
        </title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="base-url" content="<?php echo e(url()->to('/')); ?>">

        <?php echo $__env->yieldPushContent('meta'); ?>

        <?php echo themes()->setBagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'], 'installer')->toHtml(); ?>

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <link
            href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap"
            rel="stylesheet"
        />

        <link
            type="image/x-icon"
            href="<?php echo e(bagisto_asset('images/installer/favicon.ico', 'installer')); ?>"
            rel="shortcut icon"
            sizes="16x16"
        />

        <?php echo $__env->yieldPushContent('styles'); ?>
    </head>

    <?php
        $locales = [
            'ar'    => 'arabic',
            'bn'    => 'bengali',
            'ca'    => 'catalan',
            'de'    => 'german',
            'en'    => 'english',
            'es'    => 'spanish',
            'fa'    => 'persian',
            'fr'    => 'french',
            'he'    => 'hebrew',
            'hi_IN' => 'hindi',
            'id'    => 'indonesian',
            'it'    => 'italian',
            'ja'    => 'japanese',
            'nl'    => 'dutch',
            'pl'    => 'polish',
            'pt_BR' => 'portuguese',
            'ru'    => 'russian',
            'sin'   => 'sinhala',
            'tr'    => 'turkish',
            'uk'    => 'ukrainian',
            'zh_CN' => 'chinese',
        ];

        $currencies = [
            'AED' => 'united-arab-emirates-dirham',
            'ARS' => 'argentine-peso',
            'AUD' => 'australian-dollar',
            'BDT' => 'bangladeshi-taka',
            'BHD' => 'bahraini-dinar',
            'BRL' => 'brazilian-real',
            'CAD' => 'canadian-dollar',
            'CHF' => 'swiss-franc',
            'CLP' => 'chilean-peso',
            'CNY' => 'chinese-yuan',
            'COP' => 'colombian-peso',
            'CZK' => 'czech-koruna',
            'DKK' => 'danish-krone',
            'DZD' => 'algerian-dinar',
            'EGP' => 'egyptian-pound',
            'EUR' => 'euro',
            'FJD' => 'fijian-dollar',
            'GBP' => 'british-pound-sterling',
            'HKD' => 'hong-kong-dollar',
            'HUF' => 'hungarian-forint',
            'IDR' => 'indonesian-rupiah',
            'ILS' => 'israeli-new-shekel',
            'INR' => 'indian-rupee',
            'JOD' => 'jordanian-dinar',
            'JPY' => 'japanese-yen',
            'KRW' => 'south-korean-won',
            'KWD' => 'kuwaiti-dinar',
            'KZT' => 'kazakhstani-tenge',
            'LBP' => 'lebanese-pound',
            'LKR' => 'sri-lankan-rupee',
            'LYD' => 'libyan-dinar',
            'MAD' => 'moroccan-dirham',
            'MUR' => 'mauritian-rupee',
            'MXN' => 'mexican-peso',
            'MYR' => 'malaysian-ringgit',
            'NGN' => 'nigerian-naira',
            'NOK' => 'norwegian-krone',
            'NPR' => 'nepalese-rupee',
            'NZD' => 'new-zealand-dollar',
            'OMR' => 'omani-rial',
            'PAB' => 'panamanian-balboa',
            'PEN' => 'peruvian-nuevo-sol',
            'PHP' => 'philippine-peso',
            'PKR' => 'pakistani-rupee',
            'PLN' => 'polish-zloty',
            'PYG' => 'paraguayan-guarani',
            'QAR' => 'qatari-rial',
            'RON' => 'romanian-leu',
            'RUB' => 'russian-ruble',
            'SAR' => 'saudi-riyal',
            'SEK' => 'swedish-krona',
            'SGD' => 'singapore-dollar',
            'THB' => 'thai-baht',
            'TND' => 'tunisian-dinar',
            'TRY' => 'turkish-lira',
            'TWD' => 'new-taiwan-dollar',
            'UAH' => 'ukrainian-hryvnia',
            'USD' => 'united-states-dollar',
            'UZS' => 'uzbekistani-som',
            'VEF' => 'venezuelan-bolívar',
            'VND' => 'vietnamese-dong',
            'XAF' => 'cfa-franc-beac',
            'XOF' => 'cfa-franc-bceao',
            'ZAR' => 'south-african-rand',
            'ZMW' => 'zambian-kwacha'
        ];
    ?>

    <body>
        <div
            id="app"
            class="container-fluide fixed w-full"
        >
            <div class="flex [&amp;>*]:w-[50%] gap-12 justify-center items-center">
                <!-- Vue Component -->
                <v-server-requirements></v-server-requirements>
            </div>
        </div>

        <?php if (! $__env->hasRenderedOnce('13966b0a-a002-4b3d-9426-cd2503f7f86f')): $__env->markAsRenderedOnce('13966b0a-a002-4b3d-9426-cd2503f7f86f');
$__env->startPush('scripts'); ?>
            <script
                type="text/x-template"
                id="v-server-requirements-template"
            >
                <!-- Left Side Welcome to Installation -->
                <div class="flex flex-col justify-center">
                    <div class="m-auto grid h-[100vh] max-w-[362px] items-end">
                        <div class="grid gap-4">
                            <img
                                src="<?php echo e(bagisto_asset('images/installer/bagisto-logo.svg', 'installer')); ?>"
                                alt="<?php echo app('translator')->get('installer::app.installer.index.bagisto-logo'); ?>"
                            >

                            <div class="grid gap-1.5">
                                <p class="text-xl font-bold text-gray-800">
                                    <?php echo app('translator')->get('installer::app.installer.index.installation-title'); ?>
                                </p>

                                <p class="text-sm text-gray-600">
                                    <?php echo app('translator')->get('installer::app.installer.index.installation-info'); ?>
                                </p>
                            </div>

                            <div class="[&>*]:flex [&>*]:items-center [&>*]:gap-1 grid gap-3 text-sm text-gray-600">
                                <!-- Start -->
                                <div :class="[stepStates.start == 'active' ? 'font-bold' : '']">
                                    <template v-if="stepStates.start !== 'complete'">
                                        <span
                                            class="text-xl"
                                            :class="stepStates.start === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
                                        >
                                        </span>
                                    </template>

                                    <template v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </template>

                                    <p><?php echo app('translator')->get('installer::app.installer.index.start.main'); ?></p>
                                </div>

                                <!-- Server Environment -->
                                <div :class="[stepStates.systemRequirements == 'active' ? 'font-bold' : '']">
                                    <template v-if="stepStates.systemRequirements !== 'complete'">
                                        <span
                                            class="text-xl"
                                            :class="stepStates.systemRequirements === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
                                        >
                                        </span>
                                    </template>

                                    <template v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </template>

                                    <p><?php echo app('translator')->get('installer::app.installer.index.server-requirements.title'); ?></p>
                                </div>

                                <!-- ENV Database Configuration -->
                                <div :class="[stepStates.envDatabase == 'active' ? 'font-bold' : '']">
                                    <template v-if="stepStates.envDatabase !== 'complete'">
                                        <span
                                            class="text-xl"
                                            :class="stepStates.envDatabase === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
                                        >
                                        </span>
                                    </template>

                                    <template v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </template>

                                    <p>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.title'); ?>
                                    </p>
                                </div>

                                <!-- Ready For Installation -->
                                <div :class="[stepStates.readyForInstallation == 'active' ? 'font-bold' : '']">
                                    <template v-if="stepStates.readyForInstallation !== 'complete'">
                                        <span
                                            class="text-xl"
                                            :class="stepStates.readyForInstallation === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
                                        >
                                        </span>
                                    </template>

                                    <template v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </template>

                                    <p><?php echo app('translator')->get('installer::app.installer.index.ready-for-installation.title'); ?></p>
                                </div>

                                <!-- Create Sample Product -->
                                <div :class="[stepStates.createSampleProducts == 'active' ? 'font-bold' : '']">
                                    <template v-if="stepStates.createSampleProducts !== 'complete'">
                                        <span
                                            class="text-xl"
                                            :class="stepStates.createSampleProducts === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
                                        >
                                        </span>
                                    </template>

                                    <template v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </template>

                                    <p><?php echo app('translator')->get('installer::app.installer.index.sample-products.title'); ?></p>
                                </div>

                                <!-- Create Admin Configuration -->
                                <div :class="[stepStates.createAdmin == 'active' ? 'font-bold' : '']">
                                    <template v-if="stepStates.createAdmin !== 'complete'">
                                        <span
                                            class="text-xl"
                                            :class="stepStates.createAdmin === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
                                        >
                                        </span>
                                    </template>

                                    <template v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </template>

                                    <p><?php echo app('translator')->get('installer::app.installer.index.create-administrator.title'); ?></p>
                                </div>

                                <!-- Installation Completed -->
                                <div :class="[stepStates.installationCompleted == 'active' ? 'font-bold' : '']">
                                    <template v-if="stepStates.installationCompleted !== 'complete'">
                                        <span
                                            class="text-xl"
                                            :class="stepStates.installationCompleted === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
                                        >
                                        </span>
                                    </template>

                                    <template v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </template>

                                    <p><?php echo app('translator')->get('installer::app.installer.index.installation-completed.title'); ?></p>
                                </div>
                            </div>
                        </div>

                        <p class="mb-6 w-full place-self-end text-left">
                            <a
                                class="bg-white text-blue-600 underline"
                                href="https://bagisto.com/en/"
                            >
                                <?php echo app('translator')->get('installer::app.installer.index.bagisto'); ?>
                            </a>

                            <span><?php echo app('translator')->get('installer::app.installer.index.bagisto-info'); ?></span>

                            <a
                                class="bg-white text-blue-600 underline"
                                href="https://webkul.com/"
                            >
                                <?php echo app('translator')->get('installer::app.installer.index.webkul'); ?>
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Right Side Components -->
                <!-- Start -->
                <div
                    class="w-full max-w-[568px] rounded-lg border-[1px] border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'start'"
                >
                    <?php if (isset($component)) { $__componentOriginalbec3acac4544be2aa52f03d2be385ede = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec3acac4544be2aa52f03d2be385ede = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'start']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'start']); ?>
                        <form
                            @submit.prevent="handleSubmit($event, setLocale)"
                            enctype="multipart/form-data"
                            ref="multiLocaleForm"
                        >
                            <div class="border-b border-gray-300 px-4 py-3">
                                <p class="text-xl font-bold text-gray-800">
                                    <?php echo app('translator')->get('installer::app.installer.index.start.welcome-title'); ?>
                                </p>
                            </div>

                            <div class="flex h-[388px] flex-col items-center gap-3 overflow-y-auto px-7 py-4">
                                <div class="container overflow-hidden">
                                    <div class="flex h-[100px] flex-col justify-end gap-3">
                                        <p class="text-center text-sm text-gray-600">
                                            <?php echo app('translator')->get('installer::app.installer.index.installation-description'); ?>
                                        </p>
                                    </div>

                                    <div class="flex h-72 flex-col justify-center gap-3 overflow-y-auto px-7 py-4">
                                        <!-- Application Name -->
                                        <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                            <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php echo app('translator')->get('Installation Wizard language'); ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'select','name' => 'locale','rules' => 'required','value' => app()->getLocale(),'label' => trans('installer::app.installer.index.start.locale'),'@change' => '$refs.multiLocaleForm.submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'locale','rules' => 'required','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(app()->getLocale()),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.start.locale')),'@change' => '$refs.multiLocaleForm.submit();']); ?>
                                                <option
                                                    value=""
                                                    disabled
                                                >
                                                    <?php echo app('translator')->get('installer::app.installer.index.start.select-locale'); ?>
                                                </option>

                                                <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>">
                                                        <?php echo e(ucfirst($label)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'locale']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'locale']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end px-4 py-3">
                                <button
                                    type="button"
                                    class="primary-button"
                                    tabindex="0"
                                    @click="nextForm"
                                >
                                    <?php echo app('translator')->get('installer::app.installer.index.continue'); ?>
                                </button>
                            </div>
                        </form>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $attributes = $__attributesOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $component = $__componentOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__componentOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
                </div>

                <!-- System Requirements -->
                <div
                    class="w-full max-w-[568px] rounded-lg border border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'systemRequirements'"
                >
                    <div class="flex items-center justify-between gap-2.5 border-b border-gray-300 px-4 py-3">
                        <p class="text-xl font-bold text-gray-800">
                            <?php echo app('translator')->get('installer::app.installer.index.server-requirements.title'); ?>
                        </p>
                    </div>

                    <div class="flex h-[486px] flex-col gap-4 overflow-y-auto border-b border-gray-300 px-7 py-4">
                        <div class="flex items-center gap-1">
                            <span class="<?php echo e($phpVersion['supported'] ? 'icon-tick text-xl text-green-500' : ''); ?>"></span>

                            <p class="text-sm font-semibold text-gray-600">
                                <?php echo app('translator')->get('installer::app.installer.index.server-requirements.php'); ?> <span class="font-normal">(<?php echo app('translator')->get('installer::app.installer.index.server-requirements.php-version'); ?>)</span>
                            </p>
                        </div>

                        <?php $__currentLoopData = $requirements['requirements']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $requirement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center gap-1">
                                    <span class="<?php echo e($item ? 'icon-tick text-green-500' : 'icon-cross text-red-500'); ?> text-xl"></span>

                                    <p class="text-sm font-semibold text-gray-600">
                                        <?php echo app('translator')->get('installer::app.installer.index.server-requirements.' . $key); ?>
                                    </p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php
                        $hasRequirement = false;

                        foreach ($requirements['requirements']['php'] as $value) {
                            if (!$value) {
                                $hasRequirement = true;
                                break;
                            }
                        }
                    ?>

                    <div class="flex items-center justify-between px-4 py-2.5">
                        <div
                            class="cursor-pointer text-base font-semibold text-blue-600"
                            role="button"
                            aria-label="<?php echo app('translator')->get('installer::app.installer.index.back'); ?>"
                            tabindex="0"
                            @click="back"
                        >
                            <?php echo app('translator')->get('installer::app.installer.index.back'); ?>
                        </div>

                        <div
                            class="<?php echo e($hasRequirement ? 'opacity-50 cursor-not-allowed' : ''); ?> px-3 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer <?php echo e($hasRequirement ?: 'hover:opacity-90'); ?>"
                            @click="nextForm"
                            tabindex="0"
                        >
                            <?php echo app('translator')->get('installer::app.installer.index.continue'); ?>
                        </div>
                    </div>
                </div>

                <!-- Environment Configuration Database -->
                <div
                    class="w-full max-w-[568px] rounded-lg border-[1px] border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'envDatabase'"
                >
                    <?php if (isset($component)) { $__componentOriginalbec3acac4544be2aa52f03d2be385ede = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec3acac4544be2aa52f03d2be385ede = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'envDatabase']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'envDatabase']); ?>
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex items-center justify-between gap-2.5 border-b border-gray-300 px-4 py-3">
                                <p class="text-xl font-bold text-gray-800">
                                    <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.title'); ?>
                                </p>
                            </div>

                            <div class="flex h-[484px] flex-col gap-3 overflow-y-auto border-b border-gray-300 px-7 py-4">
                                <!-- Database Connection-->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.database-connection'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'select','name' => 'db_connection',':value' => 'envData.db_connection ?? \'mysql\'','rules' => 'required','label' => trans('installer::app.installer.index.environment-configuration.database-connection'),'placeholder' => trans('installer::app.installer.index.environment-configuration.database-connection')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'db_connection',':value' => 'envData.db_connection ?? \'mysql\'','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-connection')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-connection'))]); ?>
                                        <option
                                            value="mysql"
                                            selected
                                        >
                                            <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.mysql'); ?>
                                        </option>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'db_connection']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'db_connection']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Database Hostname-->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.database-hostname'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'db_hostname',':value' => 'envData.db_hostname ?? \'127.0.0.1\'','rules' => 'required','label' => trans('installer::app.installer.index.environment-configuration.database-hostname'),'placeholder' => trans('installer::app.installer.index.environment-configuration.database-hostname')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'db_hostname',':value' => 'envData.db_hostname ?? \'127.0.0.1\'','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-hostname')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-hostname'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'db_hostname']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'db_hostname']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Database Port-->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.database-port'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'db_port',':value' => 'envData.db_port ?? \'3306\'','rules' => 'required','label' => trans('installer::app.installer.index.environment-configuration.database-port'),'placeholder' => trans('installer::app.installer.index.environment-configuration.database-port')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'db_port',':value' => 'envData.db_port ?? \'3306\'','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-port')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-port'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'db_port']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'db_port']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Database name-->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.database-name'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'db_name',':value' => 'envData.db_name','rules' => 'required','label' => trans('installer::app.installer.index.environment-configuration.database-name'),'placeholder' => trans('installer::app.installer.index.environment-configuration.database-name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'db_name',':value' => 'envData.db_name','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-name')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-name'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'db_name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'db_name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Database Prefix-->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.database-prefix'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'db_prefix',':value' => 'envData.db_prefix',':rules' => '{ 
                                            max: 4, 
                                            regex: /^[a-zA-Z0-9_]*$/
                                        }','label' => trans('installer::app.installer.index.environment-configuration.database-prefix'),'placeholder' => trans('installer::app.installer.index.environment-configuration.database-prefix')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'db_prefix',':value' => 'envData.db_prefix',':rules' => '{ 
                                            max: 4, 
                                            regex: /^[a-zA-Z0-9_]*$/
                                        }','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-prefix')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-prefix'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <p class="mt-1 text-sm text-gray-500">
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.database-prefix-help'); ?>
                                    </p>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'db_prefix']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'db_prefix']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Database Username-->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.database-username'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'db_username',':value' => 'envData.db_username','rules' => 'required','label' => trans('installer::app.installer.index.environment-configuration.database-username'),'placeholder' => trans('installer::app.installer.index.environment-configuration.database-username')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'db_username',':value' => 'envData.db_username','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-username')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-username'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'db_username']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'db_username']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Database Password-->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.database-password'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'password','name' => 'db_password',':value' => 'envData.db_password','label' => trans('installer::app.installer.index.environment-configuration.database-password'),'placeholder' => trans('installer::app.installer.index.environment-configuration.database-password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'password','name' => 'db_password',':value' => 'envData.db_password','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-password')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.database-password'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'db_password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'db_password']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
                            </div>

                            <div class="flex items-center justify-between px-4 py-2.5">
                                <div
                                    class="cursor-pointer text-base font-semibold text-blue-600"
                                    role="button"
                                    :aria-label="<?php echo app('translator')->get('installer::app.installer.index.back'); ?>"
                                    tabindex="0"
                                    @click="back"
                                >
                                    <?php echo app('translator')->get('installer::app.installer.index.back'); ?>
                                </div>

                                <button
                                    type="submit"
                                    class="primary-button"
                                    tabindex="0"
                                >
                                    <?php echo app('translator')->get('installer::app.installer.index.continue'); ?>
                                </button>
                            </div>
                        </form>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $attributes = $__attributesOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $component = $__componentOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__componentOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
                </div>

                <!-- Ready For Installation -->
                <div
                    class="w-full max-w-[568px] rounded-lg border-[1px] border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'readyForInstallation'"
                >
                    <?php if (isset($component)) { $__componentOriginalbec3acac4544be2aa52f03d2be385ede = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec3acac4544be2aa52f03d2be385ede = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'envDatabase']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'envDatabase']); ?>
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex items-center justify-between gap-2.5 border-b border-gray-300 px-4 py-3">
                                <p class="text-xl font-bold text-gray-800">
                                    <?php echo app('translator')->get('installer::app.installer.index.ready-for-installation.install'); ?>
                                </p>
                            </div>

                            <div class="flex h-[484px] flex-col justify-center gap-4 overflow-y-auto border-b border-gray-300 px-7 py-4">
                                <div class="grid gap-1">
                                    <p class="text-lg font-semibold text-gray-800">
                                        <?php echo app('translator')->get('installer::app.installer.index.ready-for-installation.install-info'); ?>
                                    </p>

                                    <div class="grid gap-4">
                                        <label class="text-sm text-gray-600">
                                            <?php echo app('translator')->get('installer::app.installer.index.ready-for-installation.install-info-button'); ?>
                                        </label>

                                        <div class="grid gap-3">
                                            <div class="flex items-center gap-1 text-sm text-gray-600">
                                                <span class="icon-right text-xl"></span>

                                                <p><?php echo app('translator')->get('installer::app.installer.index.ready-for-installation.create-databsae-table'); ?></p>
                                            </div>

                                            <div class="flex items-center gap-1 text-sm text-gray-600">
                                                <span class="icon-right text-xl"></span>

                                                <p><?php echo app('translator')->get('installer::app.installer.index.ready-for-installation.populate-database-table'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between px-4 py-2.5">
                                <div
                                    class="cursor-pointer text-base font-semibold text-blue-600"
                                    role="button"
                                    :aria-label="<?php echo app('translator')->get('installer::app.installer.index.back'); ?>"
                                    tabindex="0"
                                    @click="back"
                                >
                                    Back
                                </div>

                                <button
                                    type="submit"
                                    class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3 py-1.5 font-semibold text-gray-50 hover:opacity-90"
                                >
                                    <?php echo app('translator')->get('installer::app.installer.index.ready-for-installation.start-installation'); ?>
                                </button>
                            </div>
                        </form>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $attributes = $__attributesOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $component = $__componentOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__componentOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
                </div>

                <!-- Installation Processing -->
                <div
                    class="w-full max-w-[568px] rounded-lg border-[1px] border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'installProgress'"
                >
                    <div class="flex items-center justify-between gap-2.5 border-b border-gray-300 px-4 py-3">
                        <p class="text-xl font-bold text-gray-800">
                            <?php echo app('translator')->get('installer::app.installer.index.installation-processing.title'); ?>
                        </p>
                    </div>

                    <div class="flex h-[484px] flex-col justify-center gap-4 overflow-y-auto px-7 py-4">
                        <div class="flex flex-col gap-4">
                            <p class="text-lg font-bold text-gray-800">
                                <?php echo app('translator')->get('installer::app.installer.index.installation-processing.bagisto'); ?>
                            </p>

                            <div class="grid gap-2.5">
                                <!-- Spinner -->
                                <img
                                    class="text-navyBlue h-5 w-5 animate-spin"
                                    src="<?php echo e(bagisto_asset('images/installer/spinner.svg', 'installer')); ?>"
                                    alt="Loading"
                                />

                                <p class="text-sm text-gray-600">
                                    <?php echo app('translator')->get('installer::app.installer.index.installation-processing.bagisto-info'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Environment Configuration .ENV -->
                <div
                    class="w-full max-w-[568px] rounded-lg border-[1px] border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'envConfiguration'"
                >
                    <?php if (isset($component)) { $__componentOriginalbec3acac4544be2aa52f03d2be385ede = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec3acac4544be2aa52f03d2be385ede = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'envSetup']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'envSetup']); ?>
                        <form
                            @submit.prevent="handleSubmit($event, nextForm)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex items-center justify-between gap-2.5 border-b border-gray-300 px-4 py-3">
                                <p class="text-xl font-bold text-gray-800">
                                    <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.title'); ?>
                                </p>
                            </div>

                            <div class="flex h-[484px] flex-col gap-3 overflow-y-auto border-b border-gray-300 px-7 py-4">
                                <!-- Application Name -->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.application-name'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'app_name',':value' => 'envData.app_name ?? \'Bagisto\'','rules' => 'required','label' => trans('installer::app.installer.index.environment-configuration.application-name'),'placeholder' => trans('installer::app.installer.index.environment-configuration.bagisto')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'app_name',':value' => 'envData.app_name ?? \'Bagisto\'','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.application-name')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.bagisto'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'app_name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'app_name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Application Default URL -->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.default-url'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'app_url',':value' => 'envData.app_url ?? \'https://localhost\'','rules' => 'required','label' => trans('installer::app.installer.index.environment-configuration.default-url'),'placeholder' => trans('installer::app.installer.index.environment-configuration.default-url-link')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'app_url',':value' => 'envData.app_url ?? \'https://localhost\'','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.default-url')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.default-url-link'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'app_url']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'app_url']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Application Default Timezone -->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.default-timezone'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php
                                        date_default_timezone_set('UTC');

                                        $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

                                        $current = date_default_timezone_get();
                                    ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'select','name' => 'app_timezone',':value' => 'envData.app_timezone ?? $current','rules' => 'required','ariaLabel' => trans('installer::app.installer.index.environment-configuration.default-timezone'),'label' => trans('installer::app.installer.index.environment-configuration.default-timezone')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'app_timezone',':value' => 'envData.app_timezone ?? $current','rules' => 'required','aria-label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.default-timezone')),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.default-timezone'))]); ?>
                                        <option
                                            value=""
                                            disabled
                                        >
                                            <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.select-timezone'); ?>
                                        </option>

                                        <?php $__currentLoopData = $tzlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($value); ?>"
                                                <?php echo e($value === $current ? 'selected' : ''); ?>

                                            >
                                                <?php echo e($value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'app_timezone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'app_timezone']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <div
                                    class="p-1.5"
                                    :style="warning['container'], warning['message']"
                                >
                                    <i class="icon-limited !text-black"></i>

                                    <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.warning-message'); ?>
                                </div>

                                <div class="grid grid-cols-2 gap-2.5">
                                    <!-- Application Default Locale -->
                                    <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                                        <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                            <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.default-locale'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'select','name' => 'app_locale','value' => ''.e(app()->getLocale()).'','rules' => 'required','ariaLabel' => trans('installer::app.installer.index.environment-configuration.default-locale'),'label' => trans('installer::app.installer.index.environment-configuration.default-locale')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'app_locale','value' => ''.e(app()->getLocale()).'','rules' => 'required','aria-label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.default-locale')),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.default-locale'))]); ?>
                                            <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value); ?>">
                                                    <?php echo app('translator')->get("installer::app.installer.index.$label"); ?>
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'app_locale']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'app_locale']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                    <!-- Application Default Currency -->
                                    <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                                        <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                            <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.default-currency'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'select','name' => 'app_currency',':value' => 'envData.app_currency ?? \'USD\'','ariaLabel' => trans('installer::app.installer.index.environment-configuration.default-currency'),'rules' => 'required','label' => trans('installer::app.installer.index.environment-configuration.default-currency')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'app_currency',':value' => 'envData.app_currency ?? \'USD\'','aria-label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.default-currency')),'rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.environment-configuration.default-currency'))]); ?>
                                            <option value="" disabled>Select Currencies</option>

                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value); ?>" <?php if($value == 'USD'): ?> selected <?php endif; ?>>
                                                    <?php echo app('translator')->get("installer::app.installer.index.environment-configuration.$label"); ?>
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'app_currency']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'app_currency']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
                                </div>

                                <div class="grid grid-cols-2 gap-2.5">
                                    <!-- Allowed Locales -->
                                    <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                                        <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                            <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.allowed-locales'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                        <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => '!mb-0 flex w-max cursor-pointer select-none items-center gap-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mb-0 flex w-max cursor-pointer select-none items-center gap-1']); ?>
                                                <?php
                                                    $selectedOption = ($key == config('app.locale'));
                                                ?>

                                                <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'hidden','name' => $key,'value' => (bool) $selectedOption]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hidden','name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((bool) $selectedOption)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                                <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'checkbox','id' => 'allowed_locale[' . $key . ']','name' => $key,'for' => 'allowed_locale[' . $key . ']','value' => '1','checked' => (bool) $selectedOption,'disabled' => (bool) $selectedOption,'@change' => 'pushAllowedLocales']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('allowed_locale[' . $key . ']'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('allowed_locale[' . $key . ']'),'value' => '1','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((bool) $selectedOption),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((bool) $selectedOption),'@change' => 'pushAllowedLocales']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                                <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['for' => 'allowed_locale['.e($key).']','class' => 'cursor-pointer !text-sm !font-semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'allowed_locale['.e($key).']','class' => 'cursor-pointer !text-sm !font-semibold']); ?>
                                                    <?php echo app('translator')->get("installer::app.installer.index.$locale"); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                    <!-- Allowed Currencies -->
                                    <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                                        <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                            <?php echo app('translator')->get('installer::app.installer.index.environment-configuration.allowed-currencies'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => '!mb-0 flex w-max cursor-pointer select-none items-center gap-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mb-0 flex w-max cursor-pointer select-none items-center gap-1']); ?>
                                                <?php
                                                    $selectedOption = $key == config('app.currency');
                                                ?>

                                                <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'hidden','name' => $key,'value' => $selectedOption]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hidden','name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectedOption)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                                <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'checkbox','id' => 'currency[' . $key . ']','name' => $key,'value' => '1','for' => 'currency[' . $key . ']','checked' => $selectedOption,'disabled' => $selectedOption,'@change' => 'pushAllowedCurrency']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('currency[' . $key . ']'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'value' => '1','for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('currency[' . $key . ']'),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectedOption),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectedOption),'@change' => 'pushAllowedCurrency']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                                <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['for' => 'currency['.e($key).']','class' => 'cursor-pointer !text-sm !font-semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'currency['.e($key).']','class' => 'cursor-pointer !text-sm !font-semibold']); ?>
                                                    <?php echo app('translator')->get("installer::app.installer.index.environment-configuration.$currency"); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
                                </div>
                            </div>

                            <div class="flex items-center justify-end px-4 py-2.5">
                                <?php if (isset($component)) { $__componentOriginal4d1145e91513a9944e2cd16a315f69e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d1145e91513a9944e2cd16a315f69e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.button.index','data' => ['buttonType' => 'submit','class' => 'primary-button','title' => trans('installer::app.installer.index.continue'),'tabindex' => '0',':loading' => 'isLoading',':disabled' => 'isLoading']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['button-type' => 'submit','class' => 'primary-button','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.continue')),'tabindex' => '0',':loading' => 'isLoading',':disabled' => 'isLoading']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d1145e91513a9944e2cd16a315f69e8)): ?>
<?php $attributes = $__attributesOriginal4d1145e91513a9944e2cd16a315f69e8; ?>
<?php unset($__attributesOriginal4d1145e91513a9944e2cd16a315f69e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d1145e91513a9944e2cd16a315f69e8)): ?>
<?php $component = $__componentOriginal4d1145e91513a9944e2cd16a315f69e8; ?>
<?php unset($__componentOriginal4d1145e91513a9944e2cd16a315f69e8); ?>
<?php endif; ?>
                            </div>
                        </form>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $attributes = $__attributesOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $component = $__componentOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__componentOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
                </div>

                <!-- Create Sample Products -->
                <div
                    class="w-full max-w-[568px] rounded-lg border border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'createSampleProducts'"
                >
                    <?php if (isset($component)) { $__componentOriginalbec3acac4544be2aa52f03d2be385ede = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec3acac4544be2aa52f03d2be385ede = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'createSampleProducts']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'createSampleProducts']); ?>
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex items-center justify-between gap-2.5 border-b border-gray-300 px-4 py-3">
                                <p class="text-xl font-bold text-gray-800">
                                    <?php echo app('translator')->get('installer::app.installer.index.sample-products.title'); ?>
                                </p>
                            </div>

                            <div class="flex h-[484px] flex-col gap-3 overflow-y-auto border-b border-gray-300 px-7 py-4">
                                <!-- Sample Products -->
                                <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php echo app('translator')->get("installer::app.installer.index.sample-products.sample-products"); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $attributes = $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $component = $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'select','id' => 'sample_products','name' => 'sample_products','for' => 'sample_products','value' => 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','id' => 'sample_products','name' => 'sample_products','for' => 'sample_products','value' => 0]); ?>
                                    <option value="1">
                                        <?php echo app('translator')->get('installer::app.installer.index.sample-products.yes'); ?>
                                    </option>

                                    <option value="0">
                                        <?php echo app('translator')->get('installer::app.installer.index.sample-products.no'); ?>
                                    </option>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                <a
                                    href="<?php echo e(Storage::disk('public')->url('data-transfer/samples/products.csv')); ?>"
                                    download="products.csv"
                                    id="source-sample-link"
                                    class="mt-1 cursor-pointer text-right text-sm text-blue-600 transition-all hover:underline"
                                >
                                    <?php echo app('translator')->get('installer::app.installer.index.sample-products.download-sample'); ?>
                                </a>
                            </div>

                            <div class="flex items-center justify-end px-4 py-2.5">
                                <?php if (isset($component)) { $__componentOriginal4d1145e91513a9944e2cd16a315f69e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d1145e91513a9944e2cd16a315f69e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.button.index','data' => ['buttonType' => 'submit','class' => 'primary-button','title' => trans('installer::app.installer.index.continue'),'tabindex' => '0',':loading' => 'isLoading',':disabled' => 'isLoading']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['button-type' => 'submit','class' => 'primary-button','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.continue')),'tabindex' => '0',':loading' => 'isLoading',':disabled' => 'isLoading']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d1145e91513a9944e2cd16a315f69e8)): ?>
<?php $attributes = $__attributesOriginal4d1145e91513a9944e2cd16a315f69e8; ?>
<?php unset($__attributesOriginal4d1145e91513a9944e2cd16a315f69e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d1145e91513a9944e2cd16a315f69e8)): ?>
<?php $component = $__componentOriginal4d1145e91513a9944e2cd16a315f69e8; ?>
<?php unset($__componentOriginal4d1145e91513a9944e2cd16a315f69e8); ?>
<?php endif; ?>
                             </div>
                        </form>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $attributes = $__attributesOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $component = $__componentOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__componentOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
                </div>

                <!-- Create Administrator -->
                <div
                    class="w-full max-w-[568px] rounded-lg border border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'createAdmin'"
                >
                    <?php if (isset($component)) { $__componentOriginalbec3acac4544be2aa52f03d2be385ede = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec3acac4544be2aa52f03d2be385ede = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'createAdmin']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div','ref' => 'createAdmin']); ?>
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex items-center justify-between gap-2.5 border-b border-gray-300 px-4 py-3">
                                <p class="text-xl font-bold text-gray-800">
                                    <?php echo app('translator')->get('installer::app.installer.index.create-administrator.title'); ?>
                                </p>
                            </div>

                            <div class="flex h-[484px] flex-col gap-3 overflow-y-auto border-b border-gray-300 px-7 py-4">
                                <!-- Admin -->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.create-administrator.admin'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'admin','rules' => 'required','value' => 'Admin','label' => trans('installer::app.installer.index.create-administrator.admin'),'placeholder' => trans('installer::app.installer.index.create-administrator.bagisto')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'admin','rules' => 'required','value' => 'Admin','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.create-administrator.admin')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.create-administrator.bagisto'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'admin']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'admin']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Email -->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.create-administrator.email'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'text','name' => 'email','rules' => 'required','value' => 'admin@example.com','label' => trans('installer::app.installer.index.create-administrator.email'),'placeholder' => trans('installer::app.installer.index.create-administrator.email-address')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'email','rules' => 'required','value' => 'admin@example.com','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.create-administrator.email')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.create-administrator.email-address'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'email']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Password -->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.create-administrator.password'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'password','name' => 'password','rules' => 'required|min:6','value' => old('password'),'label' => trans('installer::app.installer.index.create-administrator.password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'password','name' => 'password','rules' => 'required|min:6','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('password')),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.create-administrator.password'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'password']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>

                                <!-- Confirm Password -->
                                <?php if (isset($component)) { $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.index','data' => ['class' => 'mb-2.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2.5']); ?>
                                    <?php if (isset($component)) { $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('installer::app.installer.index.create-administrator.confirm-password'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $attributes = $__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__attributesOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813)): ?>
<?php $component = $__componentOriginal5b33eb54e7b939d073f5d266a6ae4813; ?>
<?php unset($__componentOriginal5b33eb54e7b939d073f5d266a6ae4813); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.control','data' => ['type' => 'password','name' => 'confirm_password','rules' => 'required|confirmed:@password','value' => old('confirm_password'),'label' => trans('installer::app.installer.index.create-administrator.confirm-password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'password','name' => 'confirm_password','rules' => 'required|confirmed:@password','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('confirm_password')),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('installer::app.installer.index.create-administrator.confirm-password'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $attributes = $__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__attributesOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26)): ?>
<?php $component = $__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26; ?>
<?php unset($__componentOriginal4ef2d9be16560ebf1858d6e69c1fda26); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal929a0587f26587ebf8c51e6153781bad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal929a0587f26587ebf8c51e6153781bad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'installer::components.form.control-group.error','data' => ['controlName' => 'confirm_password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('installer::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'confirm_password']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $attributes = $__attributesOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__attributesOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal929a0587f26587ebf8c51e6153781bad)): ?>
<?php $component = $__componentOriginal929a0587f26587ebf8c51e6153781bad; ?>
<?php unset($__componentOriginal929a0587f26587ebf8c51e6153781bad); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $attributes = $__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__attributesOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41)): ?>
<?php $component = $__componentOriginaldcffe483bae7b036d52dfe507f0c7f41; ?>
<?php unset($__componentOriginaldcffe483bae7b036d52dfe507f0c7f41); ?>
<?php endif; ?>
                            </div>

                            <div class="flex items-center justify-end px-4 py-2.5">
                                <button
                                    type="submit"
                                    class="primary-button"
                                    tabindex="0"
                                >
                                    <?php echo app('translator')->get('installer::app.installer.index.continue'); ?>
                                </button>
                            </div>

                        </form>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $attributes = $__attributesOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__attributesOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec3acac4544be2aa52f03d2be385ede)): ?>
<?php $component = $__componentOriginalbec3acac4544be2aa52f03d2be385ede; ?>
<?php unset($__componentOriginalbec3acac4544be2aa52f03d2be385ede); ?>
<?php endif; ?>
                </div>

                <!-- Installation Completed -->
                <div
                    class="w-full max-w-[568px] rounded-lg border border-gray-300 bg-white shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)]"
                    v-if="currentStep == 'installationCompleted'"
                >
                    <div class="flex items-center justify-between gap-2.5 border-b border-gray-300 px-4 py-3">
                        <p class="text-xl font-bold text-gray-800">
                            <?php echo app('translator')->get('installer::app.installer.index.installation-completed.title'); ?>
                        </p>
                    </div>

                    <div class="flex h-[484px] flex-col justify-center gap-4 overflow-y-auto border-b border-gray-300 px-7 py-4">
                        <div class="flex flex-col gap-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full border border-green-500">
                                <span class="icon-tick text-xl font-semibold text-green-500"></span>
                            </div>

                            <div class="grid gap-2.5">
                                <p class="text-lg font-semibold text-gray-800">
                                    <?php echo app('translator')->get('installer::app.installer.index.installation-completed.title'); ?>
                                </p>

                                <p class="text-sm text-gray-600">
                                    <?php echo app('translator')->get('installer::app.installer.index.installation-completed.title-info'); ?>
                                </p>

                                <!-- Admin & Shop both buttons -->
                                <div class="flex items-center gap-4">
                                    <a
                                        href="<?php echo e(URL('/admin/login')); ?>"
                                        class="cursor-pointer rounded-md border border-blue-700 bg-white px-3 py-1.5 font-semibold text-blue-600 hover:opacity-90"
                                    >
                                        <?php echo app('translator')->get('installer::app.installer.index.installation-completed.admin-panel'); ?>
                                    </a>

                                    <a
                                        href="<?php echo e(URL('/')); ?>"
                                        class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3 py-1.5 font-semibold text-gray-50 hover:opacity-90"
                                    >
                                        <?php echo app('translator')->get('installer::app.installer.index.installation-completed.customer-panel'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between px-4 py-2.5">
                        <a
                            href="https://forums.bagisto.com"
                            class="cursor-pointer text-xs font-semibold text-blue-600"
                        >
                            <?php echo app('translator')->get('installer::app.installer.index.installation-completed.bagisto-forums'); ?>
                        </a>

                        <a
                            href="https://bagisto.com/en/extensions"
                            class="cursor-pointer rounded-md border border-blue-700 bg-white px-3 py-1.5 font-semibold text-blue-600 hover:opacity-90"
                        >
                            <?php echo app('translator')->get('installer::app.installer.index.installation-completed.explore-bagisto-extensions'); ?>
                        </a>
                    </div>
                </div>
            </script>

            <script type="module">
                app.component('v-server-requirements', {
                    template: '#v-server-requirements-template',

                    data() {
                        return {
                            step: '',

                            currentStep: 'start',

                            envData: {},

                            locales: {
                                allowed: [],
                            },

                            currencies: {
                                allowed: [],
                            },

                            stepStates: {
                                start: 'active',
                                systemRequirements: 'pending',
                                envDatabase: 'pending',
                                readyForInstallation: 'pending',
                                envConfiguration: 'pending',
                                createSampleProducts: 'pending',
                                createAdmin: 'pending',
                                installationCompleted: 'pending',
                            },

                            steps: [
                                'start',
                                'systemRequirements',
                                'envDatabase',
                                'readyForInstallation',
                                'installProgress',
                                'envConfiguration',
                                'createSampleProducts',
                                'createAdmin',
                                'installationCompleted',
                            ],

                            warning: {
                                container: 'background: #fde68a',

                                message: 'color: #1F2937',
                            },

                            isLoading: false,
                        }
                    },

                    mounted() {
                        const preventUnload = (event) => {
                            event.preventDefault();
                        };

                        window.addEventListener('beforeunload', preventUnload);
                    },

                    methods: {
                        FormSubmit(params, { setErrors }) {
                            const stepActions = {
                                envDatabase: () => {
                                    if (params.db_connection === 'mysql') {
                                        this.completeStep('envDatabase', 'readyForInstallation', 'active', 'complete', setErrors);

                                        this.envData = { ...this.envData, ...params };
                                    } else {
                                        setErrors({ 'db_connection': ["Bagisto currently supports MySQL only."] });
                                    }
                                },

                                readyForInstallation: (setErrors) => {
                                    this.currentStep = 'installProgress';

                                    this.startMigration(setErrors);
                                },

                                createSampleProducts: (setErrors) => {
                                    this.createSampleProducts(params, setErrors);
                                },

                                createAdmin: (setErrors) => {
                                    this.isLoading = true;

                                    this.saveAdmin(params, setErrors);
                                },
                            };

                            const index = this.steps.find(step => step === this.currentStep);

                            if (stepActions[index]) {
                                stepActions[index]();
                            }
                        },

                        nextForm(params) {
                            const stepActions = {
                                start: () => {
                                    this.completeStep('start', 'systemRequirements', 'active', 'complete');
                                },

                                systemRequirements: () => {
                                    this.completeStep('systemRequirements', 'envDatabase', 'active', 'complete');

                                    this.currentStep = 'envDatabase';
                                },

                                envConfiguration: () => {
                                    this.envData = { ...params };

                                    let data = {
                                        allowed_locales: this.locales.allowed,
                                        allowed_currencies: this.currencies.allowed,
                                    };

                                    this.startSeeding(data, this.envData);
                                },

                            };

                            const index = this.steps.find(step => step === this.currentStep);

                            if (stepActions[index]) {
                                stepActions[index]();
                            }
                        },

                        pushAllowedCurrency() {
                            const currencyName = event.target.name;

                            const index = this.currencies.allowed.indexOf(currencyName);

                            if (index === -1) {
                                this.currencies.allowed.push(currencyName);
                            } else {
                                this.currencies.allowed.splice(index, 1);
                            }
                        },

                        pushAllowedLocales() {
                            const localeName = event.target.name;

                            if (! Array.isArray(this.locales.allowed)) {
                            this.locales.allowed = [];
                            }

                            const index = this.locales.allowed.indexOf(localeName);

                            if (index === -1) {
                                this.locales.allowed.push(localeName);
                            } else {
                                this.locales.allowed.splice(index, 1);
                            }
                        },

                        completeStep(fromStep, toStep, toState, nextState, setErrors) {
                            this.stepStates[fromStep] = nextState;

                            this.currentStep = toStep;

                            this.stepStates[toStep] = toState;
                        },

                        startMigration(setErrors) {
                            this.currentStep = 'installProgress';

                            this.$axios.post("<?php echo e(route('installer.env_file_setup')); ?>", this.envData)
                                .then((response) => {
                                    this.runMigartion(setErrors);
                            })
                            .catch(error => {
                                setErrors(error.response.data.errors);
                            });
                        },

                        runMigartion(setErrors) {
                            this.$axios.post("<?php echo e(route('installer.run_migration')); ?>")
                                .then((response) => {
                                    this.completeStep('readyForInstallation', 'envConfiguration', 'active', 'complete');

                                    this.currentStep = 'envConfiguration';
                                })
                                .catch(error => {
                                    alert(error.response.data.error);

                                    this.currentStep = 'envDatabase';
                                });
                        },

                        startSeeding(selectedParams, allParameters) {
                            this.$axios.post("<?php echo e(route('installer.run_seeder')); ?>", {
                                'allParameters': allParameters,
                                'selectedParameters': selectedParams
                            })
                                .then((response) => {
                                    this.completeStep('readyForInstallation', 'createSampleProducts', 'active', 'complete');

                                    this.currentStep = 'createSampleProducts';
                            })
                                .catch(error => {
                                    setErrors(error.response.data.errors);
                                });
                        },

                        createSampleProducts(params, setErrors) {
                            if (params.sample_products == 1){
                                this.isLoading = true;

                                this.$axios.post("<?php echo e(route('installer.sample_products_setup')); ?>",{
                                    'selectedLocales': this.locales.allowed,
                                    'selectedCurrencies': this.currencies.allowed,
                                })
                                    .then((response) => {
                                        this.isLoading = false;

                                        this.completeStep('createSampleProducts', 'createAdmin', 'active', 'complete');

                                        this.currentStep = 'createAdmin';
                                    })
                                    .catch(error => {
                                        setErrors(error.response.data.errors);
                                    });
                            } else {
                                this.completeStep('createSampleProducts', 'createAdmin', 'active', 'complete');

                                this.currentStep = 'createAdmin';
                            }
                        },

                        saveAdmin(params, setErrors) {
                            this.$axios.post("<?php echo e(route('installer.admin_config_setup')); ?>", params)
                                .then((response) => {
                                    this.isLoading = false;

                                    this.currentStep = 'installationCompleted';

                                    if (response.data) {
                                        this.completeStep('createAdmin', 'installationCompleted', 'active', 'complete', setErrors);
                                    }
                                })
                                .catch(error => {
                                    setErrors(error.response.data.errors);
                                });
                        },

                        setLocale(params) {
                            const newLocale = params.locale;
                            const url = new URL(window.location.href);

                            if (! url.searchParams.has('locale')) {
                                url.searchParams.set('locale', newLocale);
                                window.location.href = url.toString();
                            }
                        },

                        back() {
                            if (this.$refs[this.currentStep] && this.$refs[this.currentStep].setValues) {
                                this.$refs[this.currentStep].setValues(this.envData);
                            }

                            let index = this.steps.indexOf(this.currentStep);

                            if (index > 0) {
                                this.currentStep = this.steps[index - 1];
                            }
                        }
                    },
                });
            </script>
        <?php $__env->stopPush(); endif; ?>

        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Installer\src\Resources\views\installer\index.blade.php ENDPATH**/ ?>