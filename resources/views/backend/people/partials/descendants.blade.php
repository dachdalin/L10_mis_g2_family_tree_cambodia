<style>
    /* Tree CSS */
    * {
        margin: 0;
        padding: 0;
    }

    .tree-ltr {
        direction: ltr;
        font-size: 12px; /* Adjusted font size for better readability */
    }

    .tree-ltr ul {
        display: flex;
        width: 100%;
        overflow-x: auto;
        margin-bottom: 5px;
        padding-top: 10px; /* Adjusted padding */
        position: relative;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
    }

    .tree-ltr li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 10px 5px 0 5px; /* Adjusted padding */
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
    }

    .tree-ltr li::before,
    .tree-ltr li::after {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-top: 1px solid #ccc;
        width: 50%;
        height: 15px; /* Adjusted height */
    }

    .tree-ltr li::after {
        right: auto;
        right: 50%;
        border-left: 1px solid #ccc;
    }

    .tree-ltr li:only-child::after,
    .tree-ltr li:only-child::before {
        display: none;
    }

    .tree-ltr li:only-child {
        padding-top: 0;
    }

    .tree-ltr li:first-child::before,
    .tree-ltr li:last-child::after {
        border: 0 none;
    }

    .tree-ltr li:last-child::before {
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    .tree-ltr li:first-child::after {
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    .tree-ltr ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 1px solid #ccc;
        width: 0;
        height: 15px; /* Adjusted height */
    }

    .tree-ltr li a {
        border: 1px solid #ccc;
        padding: 5px; /* Adjusted padding */
        text-decoration: none;
        color: #666;
        font-family: arial, verdana, tahoma;
        font-size: 12px; /* Adjusted font size */
        display: inline-block;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
    }

    .tree-ltr li a img {
        width: 50px; /* Adjusted image size */
        height: auto;
        border-radius: 50%;
    }

    .tree-ltr li a span {
        display: block;
        margin-top: 5px;
        font-size: 11px; /* Adjusted font size */
    }

    .tree-ltr li a:hover,
    .tree-ltr li a:hover+ul li a {
        background: #131826;
        color: #fff;
        border: 1px solid #94a0b4;
    }

    .tree-ltr li a:hover+ul li::after,
    .tree-ltr li a:hover+ul li::before,
    .tree-ltr li a:hover+ul::before,
    .tree-ltr li a:hover+ul ul::before {
        border-color: #94a0b4;
    }
</style>

<div class="card card-ancestors-descendants">
    <div class="card-header card-ancestors-descendants-header d-flex justify-content-between align-items-center">
        <h4 class="section-title mb-0">Descendants</h4>
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button" onclick="changeDescendantLevel(-1)">-</button>
            </div>
            <input type="text" class="form-control text-center" value="1" id="descendantLevel" readonly>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="changeDescendantLevel(1)">+</button>
            </div>
        </div>
    </div>
    <div class="card-body text-center" id="descendantTree">
        <div class="tree-ltr">

            {{-- <ul>
                <li>
                    <!-- Person and Partner generation -->
                    <a href="{{ route('admin.peoples.show', $person->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                        <figure class="w-16">
                            <div class="user-image">
                                <img src="{{ $person->photo ? Storage::url('photos/' . $person->team->name . '/' . json_decode($person->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                            </div>
                            <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                {{ $person->firstname }} {{ $person->lastname }}
                            </figcaption>
                        </figure>
                    </a>
                    @if ($person->partner)
                    <a href="{{ route('admin.peoples.show', $person->partner->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                        <figure class="w-16">
                            <div class="user-image">
                                <img src="{{ $person->partner->photo ? Storage::url('photos/' . $person->partner->team->name . '/' . json_decode($person->partner->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                            </div>
                            <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                {{ $person->partner->firstname ?? '' }} {{ $person->partner->lastname ?? '' }}
                            </figcaption>
                        </figure>
                    </a>
                    @endif
                    <!-- Children generation -->
                    @if ($person->children->isNotEmpty())
                    <ul>
                        @foreach ($person->children as $child)
                        <li>
                            <a href="{{ route('admin.peoples.show', $child->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                                <figure class="w-16">
                                    <div class="user-image">
                                        <img src="{{ $child->photo ? Storage::url('photos/' . $child->team->name . '/' . json_decode($child->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                                    </div>
                                    <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                        {{ $child->firstname }} {{ $child->lastname }}
                                    </figcaption>
                                </figure>
                            </a>
                            @if ($child->partner)
                            <a href="{{ route('admin.peoples.show', $child->partner->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                                <figure class="w-16">
                                    <div class="user-image">
                                        <img src="{{ $child->partner->photo ? Storage::url('photos/' . $child->partner->team->name . '/' . json_decode($child->partner->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                                    </div>
                                    <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                        {{ $child->partner->firstname ?? '' }} {{ $child->partner->lastname ?? '' }}
                                    </figcaption>
                                </figure>
                            </a>
                            @endif
                            @if ($child->children->isNotEmpty())
                            <ul>
                                @foreach ($child->children as $grandchild)
                                <li>
                                    <a href="{{ route('admin.peoples.show', $grandchild->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                                        <figure class="w-16">
                                            <div class="user-image">
                                                <img src="{{ $grandchild->photo ? Storage::url('photos/' . $grandchild->team->name . '/' . json_decode($grandchild->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                                            </div>
                                            <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                                {{ $grandchild->firstname }} {{ $grandchild->lastname }}
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
            </ul> --}}

            <ul>
                <li>
                    <!-- Person and Partner generation -->
                    <a href="{{ route('admin.peoples.show', $person->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                        <figure class="w-16">
                            <div class="user-image">
                                <img src="{{ $person->photo ? Storage::url('photos/' . $person->team->name . '/' . json_decode($person->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                            </div>
                            <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                {{ $person->firstname }} {{ $person->lastname }}
                            </figcaption>
                        </figure>
                    </a>
                    @if ($person->partner)
                    <a href="{{ route('admin.peoples.show', $person->partner->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                        <figure class="w-16">
                            <div class="user-image">
                                <img src="{{ $person->partner->photo ? Storage::url('photos/' . $person->partner->team->name . '/' . json_decode($person->partner->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                            </div>
                            <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                {{ $person->partner->firstname ?? '' }} {{ $person->partner->lastname ?? '' }}
                            </figcaption>
                        </figure>
                    </a>
                    @endif
                    <!-- Children generation -->
                    @if ($person->children->isNotEmpty())
                    <ul>
                        @foreach ($person->children as $child)
                        <li>
                            <a href="{{ route('admin.peoples.show', $child->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                                <figure class="w-16">
                                    <div class="user-image">
                                        <img src="{{ $child->photo ? Storage::url('photos/' . $child->team->name . '/' . json_decode($child->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                                    </div>
                                    <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                        {{ $child->firstname }} {{ $child->lastname }}
                                    </figcaption>
                                </figure>
                            </a>
                            @if ($child->partner)
                            <a href="{{ route('admin.peoples.show', $child->partner->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                                <figure class="w-16">
                                    <div class="user-image">
                                        <img src="{{ $child->partner->photo ? Storage::url('photos/' . $child->partner->team->name . '/' . json_decode($child->partner->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                                    </div>
                                    <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                        {{ $child->partner->firstname ?? '' }} {{ $child->partner->lastname ?? '' }}
                                    </figcaption>
                                </figure>
                            </a>
                            @endif
                            @if ($child->children->isNotEmpty())
                            <ul>
                                @foreach ($child->children as $grandchild)
                                <li>
                                    <a href="{{ route('admin.peoples.show', $grandchild->id) }}" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                                        <figure class="w-16">
                                            <div class="user-image">
                                                <img src="{{ $grandchild->photo ? Storage::url('photos/' . $grandchild->team->name . '/' . json_decode($grandchild->photo, true)[0]) : asset('images/no_image_available.jpg') }}" class="w-full rounded shadow-lg dark:shadow-black/30">
                                            </div>
                                            <figcaption class="text-primary-500 dark:text-primary-300 text-xs">
                                                {{ $grandchild->firstname }} {{ $grandchild->lastname }}
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    {{-- <ul>
                        <li>
                            <a href="/people/19" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit" title="Female">
                                <figure class="w-24">
                                    <div class="user-image">
                                            <img src="https://genealogy.kreaweb.be/storage/photos-096/3/19_001_demo.webp" class="w-full rounded shadow-lg dark:shadow-black/30" alt="19" />

                                    </div>

                                    <figcaption class="text-primary-500 dark:text-primary-300">
                                        Beatrice Princess of York
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <li>
                            <a href="/people/20" class="text-blue-600 dark:text-blue-200 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit" title="Female">
                                <figure class="w-24">
                                    <div class="user-image">
                                            <img src="https://genealogy.kreaweb.be/storage/photos-096/3/20_001_demo.webp" class="w-full rounded shadow-lg dark:shadow-black/30" alt="20" />

                                    </div>

                                    <figcaption class="text-primary-500 dark:text-primary-300">
                                        Eugenie Princess of York
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                    </ul> --}}
                </li>
            </ul>
        </div>
    </div>
</div>






