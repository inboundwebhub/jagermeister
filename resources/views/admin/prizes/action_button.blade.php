<div class="d-flex px-3 py-1 justify-content-center align-items-center">
    @can('edit-user')
    <a class="text-sm font-weight-bold mb-0 ps-2"href="{{ route('admin.prizes.edit', $id) }}">Edit</a>
    @endcanany
    @can('delete-prize')
    <form id="deleteForm" class="mt-3" action="{{ route('admin.prizes.destroy', $id) }}" method="POST">
        @csrf
        @method('DELETE')
        <a href="#" class="text-sm font-weight-bold mb-1 ps-2" onclick="event.preventDefault(); document.getElementById('deleteForm').submit();">Delete</a>
    </form>
    
    @endcanany
</div>