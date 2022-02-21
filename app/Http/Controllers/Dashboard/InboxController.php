<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CategoryDataTable;
use App\DataTables\InboxDataTable;
use App\DataTables\TripDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\Category;
use App\Models\Inbox;
use App\Models\Trip;

class InboxController extends GeneralController
{
    protected $viewPath = 'inbox';
    protected $path = 'inboxes';
    private $route = 'inboxes';
    protected $paginate = 30;

    public function __construct(Inbox $model)
    {
        parent::__construct($model);
    }

    public function index(InboxDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function show($id)
    {
        $data = Inbox::find($id);
        $data->seen = "1";
        $data->save();
        return view('dashboard.' . $this->viewPath . '.details', compact('data'));
    }
}
