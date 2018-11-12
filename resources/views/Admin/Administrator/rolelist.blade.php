@extends("Admin.AdminPublic.publics")
@section('admin')
<div class="container"> 
    <div class="mws-panel-body no-padding"> 
     <form class="mws-form" action="/save_rolelist" method="post"> 
      <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">角色信息</label> 
        <div class="mws-form-item clearfix"> 
         <h4>当前用户{{$info->name}}---职位：{{$info->rname}}</h4> 
         <ul class="mws-form-list inline">
         
          <li> @foreach($role as $in){{$in->model}}<input type="checkbox" name="nid[]" value="{{$in->id}}" > <label>{{$in->action}}</label>|  @endforeach</li>
        
          
        </ul> 
        </div> 
       </div> 
      </div> 
      <input type="hidden" name="rid" value="{{$info->rid}}">
      <div class="mws-button-row">
        {{csrf_field()}}
        <input type="hidden" name="aid" value="{{$info->id}}">
       <input value="分配角色" class="btn btn-danger" type="submit"> 
       <input value="Reset" class="btn " type="reset"> 
      </div> 
     </form> 
    </div> 
    <!-- Panels End --> 
   </div>
@endsection
@section('title','分配角色')