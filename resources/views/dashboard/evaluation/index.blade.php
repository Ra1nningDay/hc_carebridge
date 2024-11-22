@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-5">
    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Evaluation Management Dashboard</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEvaluationTopicModal">
            <i class="bi bi-plus-circle"></i> Add Evaluation Topic
        </button>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="evaluationManagementTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="topics-tab" data-bs-toggle="tab" data-bs-target="#topics" type="button" role="tab" aria-controls="topics" aria-selected="true">
                Evaluation Topics
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ratings-tab" data-bs-toggle="tab" data-bs-target="#ratings" type="button" role="tab" aria-controls="ratings" aria-selected="false">
                Ratings
            </button>
        </li>
    </ul>

    <div class="tab-content" id="evaluationManagementTabsContent">
        <!-- Evaluation Topics -->
        <div class="tab-pane fade show active" id="topics" role="tabpanel" aria-labelledby="topics-tab">
            <div class="table-responsive rounded shadow-sm">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($evaluationTopics as $topic)
                            <tr>
                                <td class="text-center">{{ $topic->id }}</td>
                                <td>{{ $topic->title }}</td>
                                <td>{{ $topic->description }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editEvaluationTopicModal" 
                                            data-id="{{ $topic->id }}"
                                            data-title="{{ $topic->title }}"
                                            data-description="{{ $topic->description }}">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $topic->id }}" data-title="{{ $topic->title }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No topics available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Ratings -->
        <div class="tab-pane fade" id="ratings" role="tabpanel" aria-labelledby="ratings-tab">
            <div class="table-responsive rounded shadow-sm">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>Topic</th>
                            <th>Average Rating</th>
                            <th>Total Votes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ratings as $rating)
                            <tr>
                                <td class="text-center">{{ $rating->id }}</td>
                                <td>{{ $rating->topic->title }}</td>
                                <td class="text-center">{{ number_format($rating->average, 1) }}</td>
                                <td class="text-center">{{ $rating->total_votes }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No ratings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Topic Modal -->
<div class="modal fade" id="addEvaluationTopicModal" tabindex="-1" aria-labelledby="addEvaluationTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('evaluations.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEvaluationTopicModalLabel">Add Evaluation Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Topic Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Topic</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Evaluation Topic Modal -->
<div class="modal fade" id="editEvaluationTopicModal" tabindex="-1" aria-labelledby="editEvaluationTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEvaluationTopicModalLabel">Edit Evaluation Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Topic Title</label>
                        <input type="text" name="title" id="editTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editModal = document.getElementById('editEvaluationTopicModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const description = button.getAttribute('data-description');

            const form = editModal.querySelector('#editForm');
            form.action = `/evaluations/${id}`;
            editModal.querySelector('#editTitle').value = title;
            editModal.querySelector('#editDescription').value = description;
        });
    });
</script>
@endsection
