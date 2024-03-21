@inject('AdminUnitsClass', 'Admin\SystemSettings\Classes\AdminUnitsClass')
<script>
    /* ------------------------------------------------------------------------------
 *
 *  # Select2 selects
 *
 *  Specific JS code additions for form_select2.html page
 *
 * ---------------------------------------------------------------------------- */
    // Setup module
    // ------------------------------

    var parent_id = '';
    // $('.select-remote-data-subcounty').change(function(){
    //     parent_id=$('.select-remote-data-district').val();
    //     alert(parent_id);
    // });

    var Select2Selects = function () {
        //
        // Setup module components
        //

        // Select2 examples
        var _componentSelect2 = function () {


            // Admin units Districts
            $('.select-remote-data-district').select2({
                ajax: {
                    url: '/admin/settings/admin-units/district',
                    dataType: 'json',
                    delay: 0,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                }
            });

            // Admin units Subcounty

            $('.select-remote-data-district').on('select2:select', function (e) {
                parent_id=$('.select-remote-data-district').val();
                $('.select-remote-data-subcounty').select2({
                    ajax: {
                        url: '/admin/settings/admin-units/subcounty/'+parent_id,
                        dataType: 'json',
                        delay: 0,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    }
                });
            });

            // Admin units Parish
            $('.select-remote-data-subcounty').on('select2:select', function (e) {
                parent_id=$('.select-remote-data-subcounty').val();
                $('.select-remote-data-parish').select2({

                    ajax: {
                        url: '/admin/settings/admin-units/parish/'+parent_id,
                        dataType: 'json',
                        delay: 0,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    }
                });
            });

            // Admin units Village
            $('.select-remote-data-parish').on('select2:select', function (e) {
                parent_id=$('.select-remote-data-parish').val();
                // console.log(parent_id);
                $('.select-remote-data-village').select2({

                    ajax: {
                        url: '/admin/settings/admin-units/village/'+parent_id,
                        dataType: 'json',
                        delay: 0,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    }
                });
            });

        };


        //
        // Return objects assigned to module
        //

        return {
            init: function () {
                _componentSelect2();
            }
        }
    }();

    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function () {
        Select2Selects.init();
    });

</script>
