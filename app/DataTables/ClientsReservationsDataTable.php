<?php

namespace App\DataTables;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reservation;


class ClientsReservationsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'clientsreservations.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ClientsReservation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $myUsers=User::where('receptionist_id',Auth::user()->id);
        //$myUserIds=User::select('id')->where('receptionist_id',Auth::user()->id)->get();
        //$reservations=Reservation::whereIn('user_id',$myUser)->get();
        return $this->applyScopes($myUsers);
        //return  $this->applyScopes($myUsers);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('clientsreservations-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'user_id',
            'room_num',
            'accompany_number',
            'paid_price',
            'created_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ClientsReservations_' . date('YmdHis');
    }
}
