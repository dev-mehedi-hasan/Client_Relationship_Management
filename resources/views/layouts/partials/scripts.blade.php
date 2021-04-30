    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- google recaptcha  --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" ></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    {{-- DataTable js  --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    {{-- Bar Chart js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    {{-- Datepicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('public/assets/js/min.js') }}"></script>
    <script>

      (function($) {

            // Mobile Logo
            $(".mobile_logo").hide();

            // Sideber Collapse Button
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('.hide-menu').toggleClass('hide-menu-text');
                $(".components li a").toggleClass('bigIcon');
                $(".mobile_logo").toggleClass('block_logo');
                $(".full_width_logo").toggleClass('hide_logo');
                $(".avatar").toggleClass("avatar_resize");
            });

            // DataTable
            $('#DataTable').DataTable();


            // Toastr Notification
            @if(Session::has('message'))
              var type = "{{ Session::get('alert-type', 'info') }}";
              switch(type){
                    case 'info':
                      toastr.info("{{ Session::get('message') }}");
                    break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                    break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                    break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                    break;
                }
            @endif

            // tooltip
            $('[data-toggle="tooltip"]').tooltip();

            $('#submitBtn').on('submit', function(e){
                e.preventDefault();

                let name = $('#name').val();
                let email = $('#email').val();
                let mobile = $('#mobile').val();
                let user_type = $('#user_type').val();
                let _token = $("input[name=_token]").val();

                $.ajax({
                    url: "{{ route('admin.users.store') }}",
                    type:"POST",
                    data:{
                        name:name,
                        email:email,
                        mobile:mobile,
                        user_type:user_type,
                        _token:_token
                    },
                    success:function(responce)
                    {
                      if($responce){
                        $('#DataTable tbody').prepant('<tr><td>'+responce.name+'</td><td>'+responce.email+'</td><td>'+responce.mobile+'</td><td>'+responce.user_type+'</td><tr>');
                        $('#submitBtn')[0].reset();
                        $('#userModel').hide();
                      }
                      else{
                          alert('hello');
                      }
                    }

                });

            });

            var ctx = document.getElementById('myChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Recent orders","Total Orders","Total Complete","Total Incompleted","Redo Works",'Pending'],
                    datasets: [
                        {
                            data: [20,18,40,33,25,35],
                            backgroundColor: ['#B0F0B2','#B0F0B2','#B0F0B2','#B0F0B2','#B0F0B2','#B0F0B2'],
                            display: false,
                        },
                    ],
                },
                options: {

                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Order Monitoring',
                        fontSize: 25,
                        fontColor: '#333333',
                        fontStyle: 'normal'
                    },
                    tooltips: {
                        enabled: true,
                        titleFontSize: 18,
                        bodyFontSize: 15,
                        titleFontStyle: 'normal',
                        bodyFontStyle: 'normal',
                        bodyAlign: 'center',
                        yPadding: 12,
                        xPadding: 12,
                    },

                },

            });

            function disableClick(){
                document.onclick=function(event){
                if (event.button == 2) {
                    alert('Right Click Message');
                    return false;
                }
                }
            }

          })(jQuery);

    </script>

    @stack('scripts')
