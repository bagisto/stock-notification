<?php

namespace Webkul\Notify\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class NotifyDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $tablePrefix = DB::getTablePrefix();

        $queryBuilder = DB::table('notify')
            ->join('product_flat', 'product_flat.product_id', 'notify.product_id')
            ->join('customers', 'customers.id', 'notify.customer_id')
            ->select(
                'notify.id',
                'notify.product_id',
                'notify.customer_id',
                'notify.created_at',
                'notify.send_notification',
                'product_flat.name as product_name',
                DB::raw('CONCAT(' . $tablePrefix . 'customers.first_name, " ", ' . $tablePrefix . 'customers.last_name) as customer_name')
            );

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('notify::app.admin.id'),
            'type'       => 'number',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'product_name',
            'label'      => trans('notify::app.admin.product_name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'customer_name',
            'label'      => trans('notify::app.admin.customer_name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('notify::app.admin.add_date'),
            'type'       => 'date',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'send_notification',
            'label'      => trans('notify::app.admin.send_notification'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => false,
        ]);
    }
}