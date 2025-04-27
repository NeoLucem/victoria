<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\V1\EmployeeService;
use App\Http\Resources\V1\EmployeeResource;
use App\Http\Requests\V1\StoreEmployeeRequest;
use App\Http\Requests\V1\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;


class EmployeeController extends Controller
{
    protected EmployeeService $EmployeeService;

    public function __construct(EmployeeService $EmployeeService)
    {
        $this->EmployeeService = $EmployeeService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $employees = Employee::with('user')->get();
        return EmployeeResource::collection($employees);
    }

    public function store(StoreEmployeeRequest $request)
    {
        // return new EmployeeResource($employee);
        $result = $this->EmployeeService->createEmployee($request->validated());
        Log::info('EmployeeController:store', $result);

        // Pass only the employee model to the resource
        return new EmployeeResource($result['employee']);
    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }
    
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $result = $this->EmployeeService->updateEmployee($employee, $request->validated());
        Log::info('EmployeeController:update', $result);
        return new EmployeeResource($result['employee']);
    }
    
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}

