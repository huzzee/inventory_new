@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Issuance Detail</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
               

                        
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    <div class="box-header">

                                        <a href="{{ url('issuance') }}"  class="btn btn-icon waves-effect waves-light btn-danger m-b-5">Issuance List</a>

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5" style="float: right"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           
                                           <div class="col-md-3"></div>
                                         
                                            <div class="col-md-9">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Created By:</dt><dd>{{ $issuance[0]->users->username }}</dd>
                                                    
                                                    <dt>Department:</dt><dd>{{ $issuance[0]->users->my_departments->department_name }}</dd>

                                                    <dt>Requisition Code:</dt><dd>{{ $issuance[0]->requisitions->req_code }}</dd>

                                                    
                                                </dl>
                                            </div>
                                            

                                       </div>
                                       <div class="row" style="height:50px;"></div>
                                       
                                       <div class="row">
                                           
                                           <div class="col-md-3"></div>
                                         
                                            <div class="col-md-4">
                                                <table class="table table-striped m-0">

                                                    <thead>
                                                        <tr>
                                                            <th width="25%">Sr.No</th>
                                                            <th>Item Name</th>
                                                            <th width="25%">Issued Quantity</th>
                                                           
                                                           
                                                                                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="item_row">
                                                        @php $i=1; $x; @endphp
                                                        @foreach ($issuance[0]->issuanceDetails as $issue)

                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{$issue->items->item_name}}</td>
                                                                <td>{{$issue->issued_qnt}}</td>
                                                                
                                                            </tr>
                                                            @php $i++; @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            
                                       </div>
                                      
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                           
                        </div> <!-- end ard-box -->
                    </div><!-- end col-->

                    <!--new col-->
                    
                
            </div>

           

        </div> <!-- container -->

    </div> <!-- content -->

@endsection

<!--*********Page Scripts Here*********-->

@section('scripts')
       
@endsection

<!--*********Page Scripts End*********-->