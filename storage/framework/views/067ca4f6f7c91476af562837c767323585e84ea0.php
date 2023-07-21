<?php $__env->startSection('title', __('sale.products')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('sale.products'); ?>
        <small><?php echo app('translator')->get('lang_v1.manage_products'); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="col-md-3" >
            <div class="form-group">
                <?php echo Form::label('type', __('product.product_type') . ':'); ?>

                <?php echo Form::select('type', ['single' => __('lang_v1.single'), 'variable' => __('lang_v1.variable'), 'combo' => __('lang_v1.combo')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_type', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3" id="location_filter">
                <div class="form-group">
                    <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                    <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('category_id', __('product.category') . ':'); ?>

                <?php echo Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_category_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>

        <div class="col-md-3"  >
            <div class="form-group">
                <?php echo Form::label('unit_id', __('product.unit') . ':'); ?>

                <?php echo Form::select('unit_id', $units, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_unit_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3" >
            <div class="form-group">
                <?php echo Form::label('tax_id', __('product.tax') . ':'); ?>

                <?php echo Form::select('tax_id', $taxes, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_tax_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3" >
            <div class="form-group">
                <?php echo Form::label('brand_id', __('product.brand') . ':'); ?>

                <?php echo Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_brand_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>

        <div class="col-md-3" >
            <br>
            <div class="form-group">
                <?php echo Form::select('active_state', ['active' => __('business.is_active'), 'inactive' => __('lang_v1.inactive')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'active_state', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
         <div class="col-md-3" >
            <div class="form-group">
                <?php echo Form::label('image', __('lang_v1.image') . ':'); ?>

                <?php echo Form::select('type', ['default' => 'بدون صورة', 'image' => __('lang_v1.image')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_image', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
         <div class="col-md-3" >
            <div class="form-group">
                <?php echo Form::label('image',__('report.current_stock'). ':'); ?>

                <?php echo Form::select('current_stock', ['zero' =>'Zero', 'gtzero' => 'اكبر من الصفر','lszero' => 'اقل من الصفر'], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_current_stock', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>

        <!-- include module filter -->
        



        
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('price',__('lang_v1.default_selling_price'). ':'); ?>

                <div class="input-group">
                    <input type="text" class="form-control " id="default_selling_price" name="default_selling_price" value="">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default bg-white btn-flat btn-modal"  title="<?php echo app('translator')->get('unit.add_unit'); ?>" ><i class="fa fa-search text-primary fa-lg"></i></button>
                    </span>
                </div>

            </div>
        </div>

            <div class="col-md-3" >
                <div class="form-group">
                    <br>
                    <label>
                        <?php echo Form::checkbox('not_for_selling', 1, false, ['class' => 'input-icheck', 'id' => 'not_for_selling']); ?> <strong><?php echo app('translator')->get('lang_v1.not_for_selling'); ?></strong>
                    </label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                        <a class="btn btn-primary  " href="<?php echo e(action('ProductController@create'), false); ?>">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->get('product.add_new_product'); ?></a>
                    <?php endif; ?>
                </div>
            </div>

    <?php echo $__env->renderComponent(); ?>

    </div>
</div>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>



    <div class="row">
        <div class="col-md-12">


           <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#product_list_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.all_products'); ?></a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                    <li>
                        <a href="#product_stock_report" data-toggle="tab" aria-expanded="true"><i class="fa fa-hourglass-half" aria-hidden="true"></i> <?php echo app('translator')->get('report.stock_report'); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>



                <div class="tab-content">
                    <div class="tab-pane active" id="product_list_tab">

                        
                        <br><br>
                        <?php echo $__env->make('product.partials.product_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>

                    <div class="tab-pane " id="product_stock_report">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>

                                <?php echo $__env->make('report.partials.stock_report_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<input type="hidden" id="is_rack_enabled" value="<?php echo e($rack_enabled, false); ?>">

<div class="modal fade product_modal" tabindex="-1" role="dialog"
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade" id="view_product_modal" tabindex="-1" role="dialog"
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade" id="opening_stock_modal" tabindex="-1" role="dialog"
    aria-labelledby="gridSystemModalLabel">
</div>

<?php echo $__env->make('product.partials.edit_product_location_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/product.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/opening_stock.js?v=' . $asset_v), false); ?>"></script>
  
    <script type="text/javascript">
        $(document).ready( function(){
            product_table = $('#product_table').DataTable({
                processing: true,
                serverSide: true,
                aaSorting: [[3, 'asc']],
                scrollY:        "75vh",
                scrollX:        true,
                scrollCollapse: true,

                "lengthMenu": [10, 25, 50, 75, 100 ,200,1000],
                "ajax": {
                    "url": "/products",
                    "data": function ( d ) {
                        d.type = $('#product_list_filter_type').val();
                        d.category_id = $('#product_list_filter_category_id').val();
                        d.brand_id = $('#product_list_filter_brand_id').val();
                        d.unit_id = $('#product_list_filter_unit_id').val();
                        d.tax_id = $('#product_list_filter_tax_id').val();
                        d.active_state = $('#active_state').val();
                        d.not_for_selling = $('#not_for_selling').is(':checked');
                        d.location_id = $('#location_id').val();
                        d.current_stock=$("#product_list_filter_current_stock").val();
                        d.image_type=$("#product_list_filter_image").val();
                        d.default_selling_price=$("#default_selling_price").val();

                        if ($('#repair_model_id').length == 1) {
                            d.repair_model_id = $('#repair_model_id').val();
                        }

                        if ($('#woocommerce_enabled').length == 1 && $('#woocommerce_enabled').is(':checked')) {
                            d.woocommerce_enabled = 1;
                        }

                        d = __datatable_ajax_callback(d);
                    }
                },
                columnDefs: [ {
                    "targets": [0, 1, 2],
                    "orderable": false,
                    "searchable": false
                } ],
                columns: [
                        { data: 'mass_delete'  },
                        { data: 'image', name: 'products.image'  },
                        { data: 'action', name: 'action'},
                        { data: 'product', name: 'products.name'  },
                        { data: 'product_locations', name: 'product_locations'  },
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_purchase_price')): ?>
                            { data: 'purchase_price', name: 'max_purchase_price', searchable: false},
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
                            { data: 'selling_price', name: 'max_price', searchable: false},
                        <?php endif; ?>
                        { data: 'current_stock', searchable: false},
                        { data: 'type', name: 'products.type'},
                        { data: 'category', name: 'c1.name'},
                        { data: 'brand', name: 'brands.name'},
                        { data: 'tax', name: 'tax_rates.name', searchable: false},
                        { data: 'sku', name: 'products.sku'},
                        { data: 'product_custom_field1', name: 'products.product_custom_field1'  },
                        { data: 'product_custom_field2', name: 'products.product_custom_field2'  },
                        { data: 'product_custom_field3', name: 'products.product_custom_field3'  },
                        { data: 'product_custom_field4', name: 'products.product_custom_field4'  }

                    ],
                    createdRow: function( row, data, dataIndex ) {
                        if($('input#is_rack_enabled').val() == 1){
                            var target_col = 0;
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.delete')): ?>
                                target_col = 1;
                            <?php endif; ?>
                            $( row ).find('td:eq('+target_col+') div').prepend('<i style="margin:auto;" class="fa fa-plus-circle text-success cursor-pointer no-print rack-details" title="' + LANG.details + '"></i>&nbsp;&nbsp;');
                        }
                        $( row ).find('td:eq(0)').attr('class', 'selectable_td');
                    },
                    fnDrawCallback: function(oSettings) {
                        __currency_convert_recursively($('#product_table'));
                    },
            });
            // Array to track the ids of the details displayed rows
            var detailRows = [];

            $('#product_table tbody').on( 'click', 'tr i.rack-details', function () {
                var i = $(this);
                var tr = $(this).closest('tr');
                var row = product_table.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );

                if ( row.child.isShown() ) {
                    i.addClass( 'fa-plus-circle text-success' );
                    i.removeClass( 'fa-minus-circle text-danger' );

                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                } else {
                    i.removeClass( 'fa-plus-circle text-success' );
                    i.addClass( 'fa-minus-circle text-danger' );

                    row.child( get_product_details( row.data() ) ).show();

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                }
            });

            $(document).on('click', 'a.delete-product', function(e){
                e.preventDefault();
                swal({
                  title: LANG.sure,
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var href = $(this).attr('href');
                        $.ajax({
                            method: "DELETE",
                            url: href,
                            dataType: "json",
                            success: function(result){
                                if(result.success == true){
                                    toastr.success(result.msg);
                                    product_table.ajax.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }
                });
            });

            $(document).on('click', '#delete-selected', function(e){
                e.preventDefault();
                var selected_rows = getSelectedRows();

                if(selected_rows.length > 0){
                    $('input#selected_rows').val(selected_rows);
                    swal({
                        title: LANG.sure,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $('form#mass_delete_form').submit();
                        }
                    });
                } else{
                    $('input#selected_rows').val('');
                    swal('<?php echo app('translator')->get("lang_v1.no_row_selected"); ?>');
                }
            });

            $(document).on('click', '#deactivate-selected', function(e){
                e.preventDefault();
                var selected_rows = getSelectedRows();

                if(selected_rows.length > 0){
                    $('input#selected_products').val(selected_rows);
                    swal({
                        title: LANG.sure,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            var form = $('form#mass_deactivate_form')

                            var data = form.serialize();
                                $.ajax({
                                    method: form.attr('method'),
                                    url: form.attr('action'),
                                    dataType: 'json',
                                    data: data,
                                    success: function(result) {
                                        if (result.success == true) {
                                            toastr.success(result.msg);
                                            product_table.ajax.reload();
                                            form
                                            .find('#selected_products')
                                            .val('');
                                        } else {
                                            toastr.error(result.msg);
                                        }
                                    },
                                });
                        }
                    });
                } else{
                    $('input#selected_products').val('');
                    swal('<?php echo app('translator')->get("lang_v1.no_row_selected"); ?>');
                }
            })

            $(document).on('click', '#edit-selected', function(e){
                e.preventDefault();
                var selected_rows = getSelectedRows();

                if(selected_rows.length > 0){
                    $('input#selected_products_for_edit').val(selected_rows);
                    $('form#bulk_edit_form').submit();
                } else{
                    $('input#selected_products').val('');
                    swal('<?php echo app('translator')->get("lang_v1.no_row_selected"); ?>');
                }
            })

            $('table#product_table tbody').on('click', 'a.activate-product', function(e){
                e.preventDefault();
                var href = $(this).attr('href');
                $.ajax({
                    method: "get",
                    url: href,
                    dataType: "json",
                    success: function(result){
                        if(result.success == true){
                            toastr.success(result.msg);
                            product_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            });

            $(document).on('change', '#default_selling_price,#product_list_filter_image,#product_list_filter_current_stock,#product_list_filter_current_stock,#product_list_filter_type, #product_list_filter_category_id, #product_list_filter_brand_id, #product_list_filter_unit_id, #product_list_filter_tax_id, #location_id, #active_state, #repair_model_id',
                function() {
                    if ($("#product_list_tab").hasClass('active')) {
                        product_table.ajax.reload();
                    }

                    if ($("#product_stock_report").hasClass('active')) {
                        stock_report_table.ajax.reload();
                    }
            });


            $(document).on('ifChanged', '#not_for_selling, #woocommerce_enabled', function(){
                if ($("#product_list_tab").hasClass('active')) {
                    product_table.ajax.reload();
                }

                if ($("#product_stock_report").hasClass('active')) {
                    stock_report_table.ajax.reload();
                }
            });

            $('#product_location').select2({dropdownParent: $('#product_location').closest('.modal')});
        });

        $(document).on('shown.bs.modal', 'div.view_product_modal, div.view_modal',
            function(){
                var div = $(this).find('#view_product_stock_details');
            if (div.length) {
                $.ajax({
                    url: "<?php echo e(action('ReportController@getStockReport'), false); ?>"  + '?for=view_product&product_id=' + div.data('product_id'),
                    dataType: 'html',
                    success: function(result) {
                        div.html(result);
                        __currency_convert_recursively(div);
                    },
                });
            }
            __currency_convert_recursively($(this));
        });


        var data_table_initailized = false;
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            if ($(e.target).attr('href') == '#product_stock_report') {
                if (!data_table_initailized) {
                    //Stock report table
                    var stock_report_cols = [
                        { data: 'sku', name: 'variations.sub_sku' },
                        { data: 'product', name: 'p.name' },
                        { data: 'location_name', name: 'l.name' },
                        { data: 'unit_price', name: 'variations.sell_price_inc_tax' },
                        { data: 'stock', name: 'stock', searchable: false },
                    ];
                    if ($('th.stock_price').length) {
                        stock_report_cols.push({ data: 'stock_price', name: 'stock_price', searchable: false });
                        stock_report_cols.push({ data: 'stock_price_curr', name: 'stock_price_curr', searchable: false });
                        stock_report_cols.push({ data: 'stock_value_by_sale_price', name: 'stock_value_by_sale_price', searchable: false, orderable: false });
                        stock_report_cols.push({ data: 'stock_value_by_sale_price_curr', name: 'stock_value_by_sale_price_curr', searchable: false, orderable: false });
                        stock_report_cols.push({ data: 'potential_profit', name: 'potential_profit', searchable: false, orderable: false });
                    }

                    stock_report_cols.push({ data: 'total_sold', name: 'total_sold', searchable: false });
                    stock_report_cols.push({ data: 'total_transfered', name: 'total_transfered', searchable: false });
                    stock_report_cols.push({ data: 'total_adjusted', name: 'total_adjusted', searchable: false });

                    if ($('th.current_stock_mfg').length) {
                        stock_report_cols.push({ data: 'total_mfg_stock', name: 'total_mfg_stock', searchable: false });
                    }

                    stock_report_table = $('#stock_report_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '/reports/stock-report',
                            data: function(d) {
                                d.location_id = $('#location_id').val();
                                d.category_id = $('#category_id').val();
                                d.sub_category_id = $('#sub_category_id').val();
                                d.brand_id = $('#brand').val();
                                d.unit_id = $('#unit').val();
                                d.only_mfg_products = $('#only_mfg_products').length && $('#only_mfg_products').is(':checked') ? 1 : 0;
                            },
                        },
                        columns: stock_report_cols,
                        fnDrawCallback: function(oSettings) {
                            debugger;
                            $('#footer_total_stock').html(__sum_stock($('#stock_report_table'), 'current_stock'));
                            $('#footer_total_sold').html(__sum_stock($('#stock_report_table'), 'total_sold'));
                            $('#footer_total_transfered').html(
                                __sum_stock($('#stock_report_table'), 'total_transfered')
                            );
                            $('#footer_total_adjusted').html(
                                __sum_stock($('#stock_report_table'), 'total_adjusted')
                            );
                            var total_stock_price = sum_table_col($('#stock_report_table'), 'total_stock_price');
                            $('#footer_total_stock_price').text(total_stock_price);
                            var total_stock_price_curr = sum_table_col($('#stock_report_table'), 'total_stock_price_curr');
                            $('#footer_total_stock_price_curr').text(total_stock_price_curr);
                            var total_stock_value_by_sale_price = sum_table_col($('#stock_report_table'), 'stock_value_by_sale_price');
                            $('#footer_stock_value_by_sale_price').text(total_stock_value_by_sale_price);
                            var footer_stock_value_by_sale_price_curr= sum_table_col($('#stock_report_table'), 'footer_stock_value_by_sale_price_curr');
                            var total_potential_profit = sum_table_col($('#stock_report_table'), 'potential_profit');
                            $('#footer_potential_profit').text(total_potential_profit);

                            __currency_convert_recursively($('#stock_report_table'));
                            if ($('th.current_stock_mfg').length) {
                                $('#footer_total_mfg_stock').html(
                                    __sum_stock($('#stock_report_table'), 'total_mfg_stock')
                                );
                            }
                        },
                    });


                    data_table_initailized = true;
                } else {
                    stock_report_table.ajax.reload();
                }
            } else {
                product_table.ajax.reload();
            }
        });

        $(document).on('click', '.update_product_location', function(e){
            e.preventDefault();
            var selected_rows = getSelectedRows();

            if(selected_rows.length > 0){
                $('input#selected_products').val(selected_rows);
                var type = $(this).data('type');
                var modal = $('#edit_product_location_modal');
                if(type == 'add') {
                    modal.find('.remove_from_location_title').addClass('hide');
                    modal.find('.add_to_location_title').removeClass('hide');
                } else if(type == 'remove') {
                    modal.find('.add_to_location_title').addClass('hide');
                    modal.find('.remove_from_location_title').removeClass('hide');
                }

                modal.modal('show');
                modal.find('#product_location').select2({ dropdownParent: modal });
                modal.find('#product_location').val('').change();
                modal.find('#update_type').val(type);
                modal.find('#products_to_update_location').val(selected_rows);
            } else{
                $('input#selected_products').val('');
                swal('<?php echo app('translator')->get("lang_v1.no_row_selected"); ?>');
            }
        });

        $(document).on('submit', 'form#edit_product_location_form', function(e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize();

        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            beforeSend: function(xhr) {
                __disable_submit_button(form.find('button[type="submit"]'));
            },
            success: function(result) {
                if (result.success == true) {
                    $('div#edit_product_location_modal').modal('hide');
                    toastr.success(result.msg);
                    product_table.ajax.reload();
                    $('form#edit_product_location_form')
                    .find('button[type="submit"]')
                    .attr('disabled', false);
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });
    </script>

<script>
    $(document).on('click', '#select-all-row', function(e) {
    if (this.checked) {

            $('.row-select')
            .each(function() {
                if (!this.checked) {
                    $(this)
                        .prop('checked', true)
                        .change();
                }
            });
    } else {
          $('.row-select')
            .each(function() {
                if (this.checked) {
                    $(this)
                        .prop('checked', false)
                        .change();
                }
            });
    }
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/index.blade.php ENDPATH**/ ?>