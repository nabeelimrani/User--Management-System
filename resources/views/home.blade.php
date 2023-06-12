@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-lg-3">
      <div class="container">
        <div class="sidebar text-light">
          <div class="d-flex p-2 pb-0 bg-dark text-light">
            <a href="/home" class="link-light align-center text-decoration-none">
              <i class="fas fa-tachometer-alt fa-lg"></i>&nbsp;
              <span>DASHBOARD</span>
            </a>
          </div>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li>
              <a href="/home" class="nav-link link-light">
                <i class="fas fa-home"></i>&nbsp;&nbsp;
                Home
              </a>
            </li>
            <li>
              <a href="/home" class="nav-link link-light">
                <i class="fab fa-facebook-messenger"></i>&nbsp;&nbsp;
                Messenger
              </a>
            </li>
            <li>
              <a href="/home" class="nav-link link-light active">
                <i class="fas fa-user"></i>&nbsp;&nbsp;
                User
              </a>
            </li>
            <li>
              <a href="/home" class="nav-link link-light">
                <i class="fas fa-phone"></i>&nbsp;&nbsp;
                Phone Numbers
              </a>
            </li>
            <li>
              <a href="/home" class="nav-link link-light">
                <i class="fas fa-tint"></i>&nbsp;&nbsp;
                Text Drips
              </a>
            </li>
            <li>
              <a href="/home" class="nav-link link-light">
                <i class="fas fa-wallet"></i>&nbsp;&nbsp;
                Wallet
              </a>
            </li>
            <li>
              <a href="/home" class="nav-link link-light">
                <i class="fas fa-receipt"></i>&nbsp;&nbsp;
                Subscription
              </a>
            </li>
          </ul>
          <hr>
        </div>
      </div>
    </div>
    <!-- Main Content -->
    <div class="col-lg-9">
      <div class="container-fluid">
        <div class="row justify-content-center mt-4">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg-dark text-light">
                <i class="fas fa-user"></i>&nbsp;&nbsp;<strong>User</strong>
                <button class="btn btn-outline-light float-end" id="user">Add New User</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-dark" id="table">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($users)
                      @foreach($users as $user)
                      <tr class="table-active">
                        <td class="text-center">{{$user->ID}}</td>
                        <td class="text-center">{{$user->Name}}</td>
                        <td class="text-center">{{$user->Email}}</td>
                        <td class="text-center">
                          <button class="edit-button" onclick="Edit({{$user->ID}})">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button class="delete-button" onclick="Del({{$user->ID}})">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td colspan="4" class="text-center">No results found.</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form" method="post">
            @csrf
            <div class="form-group">
    <label for="name">Name:</label>
   
    <x-userform type="text" name="name" id="name" placeholder="Enter Name"/>

    <input type="hidden" name="user_id" id="user_id">

    <span id="name_error" class="text-danger"></span>
</div>

            <div class="form-group">
              <label for="email">Email:</label>
              <x-userform type="email" name="email" id="email" placeholder="Enter Email"/>
              <span id="email_error" class="text-danger"></span>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
            
              <x-userform type="password" name="password" id="password" placeholder="Enter Password"/>

              <span id="password_error" class="text-danger"></span>
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password:</label>
              
              <x-userform type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"/>

              <span id="confirmPassword_error" class="text-danger"></span>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" id="btnsave" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div><div class="container-footer">
    <footer class="footer-content">
        <div class="footer-logo">
            <a href="/home" class="text-muted text-decoration-none">
                <i class="fas fa-user text-light"></i>
            </a>
            <span class="footer-text">© 2023 USER MANAGEMENT SYSTEM, UMS</span>
        </div>

        <ul class="social-icons ">
        <li><a class="text-muted" href="https://www.linkedin.com/in/nabeel-mehdi-imrani-070498230/"><i class="fab fa-linkedin text-light"></i></a></li>
            <li><a class="text-muted" href="https://www.instagram.com/billu_badshaw/"><i class="fab fa-instagram text-light"></i></a></li>
            <li><a class="text-muted" href="https://www.facebook.com/nabeelmehdi.emraani"><i class="fab fa-facebook text-light"></i></a></li>
        </ul>
    </footer>
</div>

</div>


<!-- Rest of the code -->

    <script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
  $(document).ready(function() {
  $('#table').DataTable({
    dom: "<'row'<'col-md-6'B><'col-md-6 text-end'f>><'row'<'col-md-4'l>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
    buttons: [
      {
        extend: 'pdf',
        className: 'btn btn-outline-dark text-light mar',
        text: 'Export to PDF'
      },
      {
        extend: 'print',
        className: 'btn btn-outline-dark text-light mal',
        text: 'Print'
      }
    ],
    pagingType: 'simple',
    lengthMenu: [10, 25, 50, 100],
    pageLength: 10,
    lengthChange: true
  });

  $("#user").click(function() {
    $("#btnsave").html("Save");
      $(".modal-title").html("Create User");
      $("#name").val("");
      $("#email").val("");
    $("#modal").modal("show");
  });

  $("#form").submit(function(event) {
  event.preventDefault();

  var formdata = $("#form").serialize();
  var csrfToken = $("meta[name='csrf-token']").attr("content");
  var submitUrl = "/save";
  var submitText = "Save";


  
  var userId = $("#user_id").val();
  if (userId) {
    submitUrl = "/update/" + userId; 
   submitText = "Update";
    
  }

  $.ajaxSetup({
    method: "POST",
    url: submitUrl,
    headers: {
      "X-CSRF-Token": csrfToken
    },
    dataType: "json",
    data: formdata
  });

  $.ajax({
    success: function(response) {
      $('#modal').modal('hide');

      Swal.fire({
        icon: 'success',
        title: submitText + ' Successful',
        text: 'User ' + submitText.toLowerCase() + 'd Successfully.',
      }).then(function() {
        location.reload();
      });
    },
    error: function(xhr, status, error) {
      if (xhr.responseJSON && xhr.responseJSON.errors) {
        var errors = xhr.responseJSON.errors;

        Object.keys(errors).forEach(function(field) {
          var errorMessage = errors[field][0];
          $('#' + field + '_error').text(errorMessage);
        });
      }
    }
  });
});

  

});


function Del(userId) {
  var id = userId;
  
  Swal.fire({
    title: 'Are you sure?',
    text: 'This action cannot be undone.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then(function(result) {
    if (result.isConfirmed) {
      
      $.ajax({
        method: 'GET',
        url: '/delete/'+id,
        data: {
          user_id: userId
        },
        success: function(response) {
          
          Swal.fire({
            icon: 'success',
            title: 'User Deleted',
            text: 'The user has been deleted successfully.'
          }).then(function() {
            
            location.reload();
          });
        },
        error: function(xhr, status, error) {
          
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while deleting the user.'
          });
        }
      });
    }
  });
}

function Edit(userId) {
  $.ajax({
    method: 'GET',
    url: '/edit/' + userId, 
    success: function(response) {
      
      $('#name').val(response.name);
      $('#email').val(response.email);
      $("#user_id").val(response.id);
      
      $("#btnsave").html("Update");
      $(".modal-title").html("Edit User");
      
    
     
      
      $('#modal').modal('show');
    },
    error: function(xhr, status, error) {
      
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'An error occurred while fetching user data.'
      });
    }
  });
}

    </script>

@endsection