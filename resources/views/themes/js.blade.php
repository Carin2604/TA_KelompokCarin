<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('keenthemes/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('keenthemes/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
@guest
<script src="{{asset('js/auth.js')}}"></script>
@endguest
@auth
<script src="{{asset('js/plugin.js')}}"></script>
<script src="{{asset('js/method.js')}}"></script>
@endauth
<!--end::Page Vendors Javascript-->