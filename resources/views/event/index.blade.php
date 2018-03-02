@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Booth</div>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="panel-body">
                        <a href="{{ url('/event/create') }}" class="btn btn-success btn-sm" title="Add New Device">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                       <!--  {!! Form::open(['method' => 'GET', 'url' => '/event', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    search<i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!} -->

                        <br/>
                        <br/>
                        <div class="">
                            <table class="table table-borderless" style="width: 1073px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hotel</th>
                                        <th>Time</th>
                                        <!-- <th>Status</th>                                         -->
                                        <th>start_date</th>
                                        <th>end_date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($device as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <!-- <td> -->
                                        <?php 
                                            // if(!empty($item->one_hotel)){
                                            //     echo $item->one_hotel->name;
                                            // }else{
                                            //     echo "Hotel is deleted";
                                            // }
                                        ?>
                                        <!-- </td> -->
                                        <!-- <td> -->
                                        <?php 
                                            // if($item->status == 0){
                                            //     echo "Disable";
                                            // }else{
                                            //     echo "Enable";
                                            // }
                                        ?>
                                        <!-- </td> -->
                                        <td>
                                            <?php 
                                                if(!$item->one_hotel->isEmpty){
                                                    echo $item->one_hotel->name;
                                                }else{
                                                    echo "Enable";
                                                }
                                            ?>
                                        </td>
                                        <td>{{ $item->time }}</td>
                                        <td><?php 
                                        // echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->start_date))->diffForHumans();
                                        echo $item->start_date; 
                                        ?></td>
                                        <td>{{ $item->end_date }}</td>

                                        <td>
                                            <a href="/reset_all_booth/{{ $item->one_hotel->id }}" title="View User"><button class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i> Activate all Booth</button></a>
                                            <a href="{{ url('/event/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/event/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/event', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete User',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $device->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
