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
@if($configData['blankPage'] === false)
<script src="{{ asset('js/scripts/customizer.js') }}"></script>
@endif
{{-- page script --}}
@yield('page-script')
{{-- page script --}}