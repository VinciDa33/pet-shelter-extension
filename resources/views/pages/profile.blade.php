<?php $title = "Profile" ?>
<x-layout :title="$title">
    <h1 class="lilita-one-font">{{$title}}</h1>
    
    <div class="Profile data lilita-one-font" id="dataForm">
        <form method="POST" action="/profile">
            @csrf
            <p class="mb-0 color-navy">{{$errors->first('name')}}</p>
            <label class="color-blue">Display name: </label>
            <label>{{{auth()->user()->name}}}</label><br>
            <br>
            <p class="mb-0 color-navy"">{{$errors->first('email')}}</p>
            <label class="color-blue">E-mail: </label>
            <label>{{{auth()->user()->email}}} </label><br>
            <br>
            <p class="mb-0 color-navy"">{{$errors->first('phone')}}</p>
            <label class="color-blue">Phone number: </label>
            <label>{{{auth()->user()->phone}}} </label><br>
            <a class="btn view-button btn-lg" id="viewPost" href="/post-management">View my posts</a>
            <a class="btn view-button btn-lg" id="edit" onclick="edit()" form="editForm">Edit</a>
    </div>
    <div class="Edit profile lilita-one-font" id="editForm" style="display: none">
            
            <label class="color-blue">Display name: </label>
            <input type="text" name="name" value={{{auth()->user()->name}}}><br>
            <br>
            <label class="color-blue">E-mail: </label>
            <input type="text" name="email" value={{{auth()->user()->email}}}><br>
            <br>
            <label class="color-blue">Phone number: </label>
            <input type="text" name="phone" value={{{auth()->user()->phone}}}><br>
            <a class="btn view-button btn-lg" href="/post-management">View my posts</a>
            <input class="btn view-button btn-lg" type="submit" value="save">
        </form>
    </div>
    
    <script>
        function edit(){
            var displayDiv = document.getElementById("dataForm")
            var editDiv = document.getElementById("editForm");
            var editBut = document.getElementById("edit button");
            

            if(editDiv.style.display === "none"){
                editDiv.style.display = "block";
                displayDiv.style.display = "none";
                editBut.innerHTML = "save";
                editBut.type = "submit";
                editBut.form = "editForm";
                viewPost.style.display = "none";
                edit.style.display = "none";
                
            }
            else{
                editDiv.style.display = "none";
                displayDiv.style.display = "block";
                editBut.innerHTML = "edit";
                editBut.type = "button";
            }
        }
    </script>
    
    
</x-layout>