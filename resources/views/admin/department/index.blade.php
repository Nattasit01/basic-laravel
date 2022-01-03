<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Hello, {{Auth::user()->name}}
            <hr>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h3>Department</h3>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">ตารางข้อมูลแผนก</div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('addDepartment')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="department_name">ชื่อตำแหน่งงาน</label>
                                    <input type="text" class="form-control" name="department_name" id="department_name" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-primary mt-1 float-end">บันทึก</button>
                                @error('department_name')
                                    <p class="badge bg-danger text-wrap">{{$message}}</p>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div> --}}
    </div>
</x-app-layout>
