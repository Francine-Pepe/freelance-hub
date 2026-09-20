<section class="corkboard-component">
    <div class="corkboard">
        <h1>Little reminders</h1>

        <div class="corkboard__notes">
            @forelse ($reminders as $reminder)
                <x-post-it :reminder="$reminder" />

                @empty
                <p class="corkboard__empty">
                    No reminders yet.
                </p>
            @endforelse
        </div>

    </div>
    <form
        method="POST"
        action="{{ route('reminders.store') }}"
        class="corkboard__form"
    >
        @csrf
        <label for="corkboard-reminder">
            Add a reminder
        </label>

        <div class="corkboard__form-row">
            <input
                id="corkboard-reminder"
                type="text"
                name="content"
                placeholder="Write a reminder..."
                maxlength="120"
                required
            >
            <button type="submit">
                Add
            </button>
        </div>
    </form>
</section>
