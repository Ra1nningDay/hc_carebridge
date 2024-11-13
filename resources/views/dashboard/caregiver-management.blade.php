@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4 mb-4">Caregiver Applications</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <!-- Caregiver Applications Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Specialization</th>
                    <th>Experience (Years)</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($caregivers as $caregiver)
                    <tr>
                        <td>{{ $caregiver->id }}</td>
                        <td>{{ $caregiver->user_id }}</td>
                        <td>{{ $caregiver->specialization }}</td>
                        <td>{{ $caregiver->experience_years }}</td>
                        <td>{{ $caregiver->status }}</td>
                        <td>
                            <form action="{{ route('caregivers.updateStatus', $caregiver->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="input-group">
                                    <select name="status" class="form-select" required>
                                        <option value="Pending" {{ $caregiver->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Approved" {{ $caregiver->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="Rejected" {{ $caregiver->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No caregivers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
