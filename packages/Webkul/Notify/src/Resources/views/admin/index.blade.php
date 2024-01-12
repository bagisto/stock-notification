<x-admin::layouts>
    <x-slot:title>
        Notify
    </x-slot:title>

    <div class="flex  gap-[16px] justify-between items-center max-sm:flex-wrap">
        <p class="py-[11px] text-[20px] text-gray-800 dark:text-white font-bold">
            Notify
        </p>
    </div>

    <v-notify></v-notify>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-notify-template">

            {!! view_render_event('admin.customers.reviews.list.before') !!}

            <x-admin::datagrid
                src="{{ route('notify.admin.index') }}"
                :isMultiRow="true"
                ref="notify_data"
            >
                <template #body="{ columns, records, setCurrentSelectionMode, applied, isLoading, performAction }">
                    <template v-if="! isLoading">
                        <div
                            class="row grid grid-cols-6 px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                            v-for="record in records" style="grid-template-columns: repeat(5, 1fr);"
                        >
                            <!-- id -->
                            <p
                                class="text-[16px] text-gray-800 dark:text-white"
                                v-text="record.id" 
                            >
                            </p>

                            <!-- Product name -->
                            <p
                                class="text-[16px] text-gray-800 dark:text-white"
                                v-text="record.product_name"
                            >
                            </p>

                            <!-- Customer name -->
                            <p 
                                class="text-[16px] text-gray-800 dark:text-white"
                                v-text="record.customer_name"
                            >
                            </p>

                            <!-- Date -->
                            <p
                                class="text-[16px] text-gray-800 dark:text-white"
                                v-text="record.created_at"
                            >
                            </p>

                            <div class="flex">
                                <button
                                    class="primary-button"
                                    type="button"
                                    @click="notifyNow(record.id)"
                                >
                                    Send Notification
                                </button>
                            </div>
                        </div>
                    </template>

                    <!-- Datagrid Body Shimmer -->
                    <template v-else>
                        <x-admin::shimmer.datagrid.table.body :isMultiRow="true"></x-admin::shimmer.datagrid.table.body>
                    </template>
                </template>
            </x-admin::datagrid>
        </script>

        <script type="module">
            app.component('v-notify', {
                template: '#v-notify-template',
                methods: {
                    notifyNow(id) {
                        let formData = new FormData();
                        formData.append('id', id);

                        this.$axios.post(`{{ route('notify.admin.send_notification') }}`, formData)
                            .then((response) => {
                                this.$emitter.emit('add-flash', { type: 'success', message: 'Notified Successfully' });
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                        },
                }
            })
        </script>
    @endPushOnce
</x-admin::layouts>