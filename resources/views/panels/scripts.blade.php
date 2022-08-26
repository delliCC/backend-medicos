{{-- Vendor Scripts --}}
<script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('vendors/js/ui/prism.min.js') }}"></script>

<script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/polyfill.min.js') }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset('js/core/app-menu.js') }}"></script>
<script src="{{ asset('js/core/app.js') }}"></script>

<script src="{{ asset('js/scripts/extensions/ext-component-blockui.js') }}"></script>
<script src="{{ asset('js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
<script src="{{ asset('js/scripts/components/components-navs.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh1gZvUsD9ljetIt-i5jfTPtXhHB8uq7Y&sensor=true"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@if($configData['blankPage'] === false)
<script src="{{ asset('js/scripts/customizer.js') }}"></script>
@endif
{{-- page script --}}
@yield('page-script')
{{-- page script --}}