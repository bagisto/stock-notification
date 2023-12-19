<x-admin::layouts>
    <x-admin::datagrid :src="route('notify.admin.index')">
    </x-admin::datagrid>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function sendQuickMail(notificationId) {
            $.ajax({
                type: 'POST',
                url: '{{ route("notify.admin.updateStockStatus") }}',
                data: {
                    notificationId: notificationId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(error) {
                    console.error('Error sending notification:', error);
                }
            });
        }
    </script>
</x-admin::layouts>