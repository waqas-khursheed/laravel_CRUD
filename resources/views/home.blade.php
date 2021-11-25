@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>
<button id="show">View</button>
<button id="add">Add</button>
<div id="cont"></div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script>
    $(document).ready(function(){


        function getdata(){
            $.ajax({
               url : "{{ url('/todo_show')}}",
               type : "get",

               success : function (data){
                   $('#cont').html(data);
               }
           });
        }
        $('#show').on('click', function(e){
            e.preventDefault();
            getdata();
        });
        getdata();


        function getAddForm(){
            $.ajax({
                url : "{{ url('/todo_create')}}",
                type : "get",
                success : function (data){
                    
                    $('#cont').html(data);
                }
            });
        }
        $('#add').on('click', function(e){
            e.preventDefault();
            getAddForm();
        });
   
        


        /*
       $('#show').on('click', function(e){
           e.preventDefault();
           $.ajax({
               url : "{{ url('/todo_show')}}",
               type : "get",

               success : function (data){
                   $('#cont').html(data);
                   $('#show').hide();
               }
           });
       });
       */
        
    });
</script>
