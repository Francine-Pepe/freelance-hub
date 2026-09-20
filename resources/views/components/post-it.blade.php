<article class="corkboard__note">

    <p class="corkboard__note-text">
        {{ $reminder->content }}
    </p>

    <form
        method="POST"
        action="{{ route('reminders.destroy', $reminder) }}"
        class="corkboard__note-delete"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            aria-label="Delete reminder"
        >
            ×
        </button>
    </form>

</article>
