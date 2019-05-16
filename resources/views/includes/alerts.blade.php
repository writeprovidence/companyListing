
            @if (session('success'))
                <script>
                   toastr.success(" {{session('success')}} ")
                </script>
            @endif
            @if (session('error'))
               <script>
                    toastr.success(" {{session('error')}} ")
                </script>
            @endif

            @if (session('info'))
            <script>
               toastr.info(" {{session('info')}} ")
            </script>
            @endif
