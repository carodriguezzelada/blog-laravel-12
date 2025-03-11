<x-layouts.app title="Category">

    <div class="mb-4 flex justify-between items-center">

        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.categories.index')">
                Categories
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Create Category
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

    </div>

    <div class="card">

        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf

            <div>
                <flux:input wire:model="name" label="Name" description="Name of the category" value="{{ old('name') }}" />

                <div class="flex justify-end mt-4">
                    <flux:button variant="primary" type="submit">Store</flux:button>
                </div>
            </div>
        </form>
    </div>

</x-layauts.app>
