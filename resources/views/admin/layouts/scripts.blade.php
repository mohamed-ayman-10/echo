<!-- latest jquery-->
<script src="{{asset('assets')}}/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets')}}/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="{{asset('assets')}}/js/icons/feather-icon/feather.min.js"></script>
<script src="{{asset('assets')}}/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="{{asset('assets')}}/js/scrollbar/simplebar.js"></script>
<script src="{{asset('assets')}}/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets')}}/js/config.js"></script>
<script src="{{asset('assets')}}/js/sidebar-menu.js"></script>
<script src="{{asset('assets')}}/js/prism/prism.min.js"></script>
<script src="{{asset('assets')}}/js/clipboard/clipboard.min.js"></script>
<script src="{{asset('assets')}}/js/counter/jquery.waypoints.min.js"></script>
<script src="{{asset('assets')}}/js/counter/jquery.counterup.min.js"></script>
<script src="{{asset('assets')}}/js/counter/counter-custom.js"></script>
<script src="{{asset('assets')}}/js/custom-card/custom-card.js"></script>
<script src="{{asset('assets')}}/js/datepicker/date-picker/datepicker.js"></script>
<script src="{{asset('assets')}}/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="{{asset('assets')}}/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="{{asset('assets')}}/js/owlcarousel/owl.carousel.js"></script>
<script src="{{asset('assets')}}/js/general-widget.js"></script>
<script src="{{asset('assets')}}/js/height-equal.js"></script>
<script src="{{asset('assets')}}/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/js/datatable/datatables/datatable.custom.js"></script>
<script src="{{asset('assets')}}/js/tooltip-init.js"></script>
<!-- Template js-->
<script src="{{asset('assets')}}/js/script.js"></script>
<script src="{{asset('assets')}}/js/theme-customizer/customizer.js"></script>
<!-- login js-->

<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(Session::has('success'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.success("{{Session::get('success')}}", "{{__('Success!')}}", {timeOut:4000})
    </script>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
            }
            toastr.error("{{$error}}", 'Error!', {timeout:4000})
        </script>

    @endforeach
@endif

@yield('scripts')
