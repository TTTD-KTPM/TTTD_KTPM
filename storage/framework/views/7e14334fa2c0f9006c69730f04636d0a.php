<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'text',
    'name' => '',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'type' => 'text',
    'name' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php switch($type):
    case ('hidden'): ?>
    <?php case ('text'): ?>
    <?php case ('email'): ?>
    <?php case ('password'): ?>
    <?php case ('number'): ?>
        <v-field
            name="<?php echo e($name); ?>"
            v-slot="{ field }"
            <?php echo e($attributes->only(['value', ':value', 'v-model', 'rules', ':rules', 'label', ':label'])); ?>

        >
            <input
                type="<?php echo e($type); ?>"
                name="<?php echo e($name); ?>"
                v-bind="field"
                :class="[errors['<?php echo e($name); ?>'] ? 'border border-red-600 hover:border-red-600' : '']"
                <?php echo e($attributes->except(['value', ':value', 'v-model', 'rules', ':rules', 'label', ':label'])->merge(['class' => 'w-full appearance-none rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400'])); ?>

            >
        </v-field>

        <?php break; ?>

    <?php case ('select'): ?>
        <v-field
            name="<?php echo e($name); ?>"
            v-slot="{ field }"
            <?php echo e($attributes->only(['value', ':value', 'v-model', 'rules', ':rules', 'label', ':label'])); ?>

        >
            <select
                name="<?php echo e($name); ?>"
                v-bind="field"
                :class="[errors['<?php echo e($name); ?>'] ? 'border border-red-500' : '']"
                <?php echo e($attributes->except(['value', ':value', 'v-model', 'rules', ':rules', 'label', ':label'])->merge(['class' => 'custom-select w-full rounded-md border bg-white px-3 py-2.5 text-sm font-normal text-gray-600 transition-all hover:border-gray-400'])); ?>

            >
                <?php echo e($slot); ?>

            </select>
        </v-field>

        <?php break; ?>

    <?php case ('checkbox'): ?>
        <v-field
            v-slot="{ field }"
            name="<?php echo e($name); ?>"
            type="checkbox"
            class="hidden"
            <?php echo e($attributes->only(['value', ':value', 'v-model', 'rules', ':rules', 'label', ':label'])); ?>

        >
            <input
                type="checkbox"
                name="<?php echo e($name); ?>"
                v-bind="field"
                class="peer sr-only"
                <?php echo e($attributes->except(['rules', 'label', ':label'])); ?>

            />

            <v-checkbox-handler
                :field="field"
                checked="<?php echo e($attributes->get('checked')); ?>"
            >
            </v-checkbox-handler>
        </v-field>

        <label
            class="icon-checkbox-normal peer-checked:icon-checkbox-active cursor-pointer text-2xl peer-checked:text-blue-600"
            <?php echo e($attributes->except(['value', ':value', 'v-model', 'rules', ':rules', 'label', ':label'])); ?>

        >
        </label>

        <?php break; ?>
<?php endswitch; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Installer\src\Resources\views\components\form\control-group\control.blade.php ENDPATH**/ ?>