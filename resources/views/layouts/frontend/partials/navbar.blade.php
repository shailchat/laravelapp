<div class="flex justify-center space-x-5 border-b">
    <a href={{ url("/")}} class="font-semibold py-5 hover:text-blue-500">Home</a>
    <a href={{ route('addEmployeeName') }} class="font-semibold py-5 hover:text-blue-500">Add Employee</a>
    <a href={{ url("/employees")}} class="font-semibold py-5 hover:text-blue-500">List Employees</a>
    <a href={{ url("/employees/deleted")}} class="font-semibold py-5 hover:text-blue-500">Deleted Employees</a>
</div>
