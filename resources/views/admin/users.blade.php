@extends('admin.layout')

@section('title', 'Users')

@section('content')
<div class="container-fluid">

  <h3 class="mb-4 fw-bold text-light">👥 Users</h3>

  <!-- ✅ Responsive Table Wrapper -->
  <div class="table-responsive shadow-lg rounded">
    <table class="table table-dark table-striped align-middle text-center mb-0">
      <thead class="table-success text-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td class="fw-semibold">{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->mobile ?? '—' }}</td>
            <td>
              <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary px-3">
                <i class="bi bi-pencil-square"></i> Edit
              </a>
              <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger px-3" onclick="return confirm('Are you sure you want to delete this user?')">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-muted py-4">No users found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>
@endsection
