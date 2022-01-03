<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Hello, {{Auth::user()->name}}
            <span class="float-end">จำนวนผู้ใช้งานระบบ {{count($users)}} คน</span>
            <hr>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h3>รายชื่อผู้ใช้งานในระบบ</h3>
            </div>
            <!-- /.row -->
            <div class="row">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">เริ่มใช้งานระบบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                {{-- <td>{{$user->created_at->diffForHumans()}}</td> <!-- Eloquent --> --}}
                                <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td> <!-- Query Builder -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
