<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\V1\EmployeeService;
use App\Http\Resources\V1\EmployeeResource;
use App\Http\Requests\V1\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;


class EmployeeController extends Controller
{
    protected EmployeeService $EmployeeService;

    public function __construct(EmployeeService $EmployeeService)
    {
        $this->EmployeeService = $EmployeeService;
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = $this->EmployeeService->createEmployee($request->validated());

        return new EmployeeResource($employee);
    }
}

