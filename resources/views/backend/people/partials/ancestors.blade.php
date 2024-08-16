<style>
    /* Tree CSS */
    * {
        margin: 0;
        padding: 0;
    }

    .tree-rtl {
        direction: rtl;
        transform: rotate(180deg);
        font-size: 12px;
    }

    .tree-rtl ul {
        display: flex;
        width: 100%;
        overflow-x: auto;
        margin-bottom: 5px;
        padding-top: 10px;
        position: relative;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
    }

    .tree-rtl li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 10px 5px 0 5px;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
    }

    .tree-rtl li::before,
    .tree-rtl li::after {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-top: 1px solid #ccc;
        width: 50%;
        height: 15px;
        transform: scaleX(-1);
    }

    .tree-rtl li::after {
        right: auto;
        right: 50%;
        border-left: 1px solid #ccc;
    }

    .tree-rtl li:only-child::after,
    .tree-rtl li:only-child::before {
        display: none;
    }

    .tree-rtl li:only-child {
        padding-top: 0;
    }

    .tree-rtl li:first-child::before,
    .tree-rtl li:last-child::after {
        border: 0 none;
    }

    .tree-rtl li:last-child::before {
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    .tree-rtl li:first-child::after {
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    .tree-rtl ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 1px solid #ccc;
        width: 0;
        height: 15px;
    }

    .tree-rtl li a {
        border: 1px solid #ccc;
        padding: 5px;
        text-decoration: none;
        color: #666;
        font-family: arial, verdana, tahoma;
        font-size: 12px;
        display: inline-block;
        transform: rotate(180deg);
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
    }

    .tree-rtl li a img {
        width: 100px;
        height: auto;
        border-radius: 50%;
    }

    .tree-rtl li a span {
        display: block;
        margin-top: 5px;
        font-size: 11px;
    }

    .tree-rtl li a:hover,
    .tree-rtl li a:hover+ul li a {
        background: #131826;
        color: #fff;
        border: 1px solid #94a0b4;
    }

    .tree-rtl li a:hover+ul li::after,
    .tree-rtl li a:hover+ul li::before,
    .tree-rtl li a:hover+ul::before,
    .tree-rtl li a:hover+ul ul::before {
        border-color: #94a0b4;
    }

    .hidden {
        display: none;
    }
</style>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="section-title mb-0">ដូនតា Ancestors</h4>
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button" onclick="changeAncestorLevel(-1)">-</button>
            </div>
            <input type="text" class="form-control text-center" value="3" id="ancestorLevel" readonly>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="changeAncestorLevel(1)">+</button>
            </div>
        </div>
    </div>
    <div class="card-body text-center" id="ancestorTree">
        <div class="tree-rtl">
            <ul class="depth-1">
                <li>
                    <a href="{{ route('admin.peoples.show', $person->id) }}">
                        <img src="{{ $person->photo ? Storage::url('photos/' . $person->team->name . '/' . json_decode($person->photo, true)[0]) : asset('images/no_image_available.jpg') }}">
                        <span>{{ $person->firstname }} {{ $person->lastname }}</span>
                    </a>
                    @if ($person->father || $person->mother)
                        <ul class="depth-2">
                            @if ($person->father)
                                <li>
                                    <a href="{{ route('admin.peoples.show', $person->father->id) }}">
                                        <img src="{{ $person->father->photo ? Storage::url('photos/' . $person->father->team->name . '/' . json_decode($person->father->photo, true)[0]) : asset('images/no_image_available.jpg') }}">
                                        <span>{{ $person->father->firstname }} {{ $person->father->lastname }}</span>
                                    </a>
                                    @if ($person->father->father || $person->father->mother)
                                        <ul class="depth-3">
                                            @if ($person->father->father)
                                                <li>
                                                    <a href="{{ route('admin.peoples.show', $person->father->father->id) }}">
                                                        <img src="{{ $person->father->father->photo ? Storage::url('photos/' . $person->father->father->team->name . '/' . json_decode($person->father->father->photo, true)[0]) : asset('images/no_image_available.jpg') }}">
                                                        <span>{{ $person->father->father->firstname }} {{ $person->father->father->lastname }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if ($person->father->mother)
                                                <li>
                                                    <a href="{{ route('admin.peoples.show', $person->father->mother->id) }}">
                                                        <img src="{{ $person->father->mother->photo ? Storage::url('photos/' . $person->father->mother->team->name . '/' . json_decode($person->father->mother->photo, true)[0]) : asset('images/no_image_available.jpg') }}">
                                                        <span>{{ $person->father->mother->firstname }} {{ $person->father->mother->lastname }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </li>
                            @endif
                            @if ($person->mother)
                                <li>
                                    <a href="{{ route('admin.peoples.show', $person->mother->id) }}">
                                        <img src="{{ $person->mother->photo ? Storage::url('photos/' . $person->mother->team->name . '/' . json_decode($person->mother->photo, true)[0]) : asset('images/no_image_available.jpg') }}">
                                        <span>{{ $person->mother->firstname }} {{ $person->mother->lastname }}</span>
                                    </a>
                                    @if ($person->mother->father || $person->mother->mother)
                                        <ul class="depth-3">
                                            @if ($person->mother->father)
                                                <li>
                                                    <a href="{{ route('admin.peoples.show', $person->mother->father->id) }}">
                                                        <img src="{{ $person->mother->father->photo ? Storage::url('photos/' . $person->mother->father->team->name . '/' . json_decode($person->mother->father->photo, true)[0]) : asset('images/no_image_available.jpg') }}">
                                                        <span>{{ $person->mother->father->firstname }} {{ $person->mother->father->lastname }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if ($person->mother->mother)
                                                <li>
                                                    <a href="{{ route('admin.peoples.show', $person->mother->mother->id) }}">
                                                        <img src="{{ $person->mother->mother->photo ? Storage::url('photos/' . $person->mother->mother->team->name . '/' . json_decode($person->mother->mother->photo, true)[0]) : asset('images/no_image_available.jpg') }}">
                                                        <span>{{ $person->mother->mother->firstname }} {{ $person->mother->mother->lastname }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let ancestorLevel = parseInt(document.getElementById('ancestorLevel').value);
    updateTreeVisibility(ancestorLevel);
    console.log('Initial ancestor level:', ancestorLevel);
});

function changeAncestorLevel(level) {
    let ancestorLevel = document.getElementById('ancestorLevel');
    let currentLevel = parseInt(ancestorLevel.value);
    let newLevel = currentLevel + level;

    if (newLevel > 0) {
        ancestorLevel.value = newLevel;
        updateTreeVisibility(newLevel);
        console.log('Changed ancestor level:', newLevel);
    }

    // Disable buttons based on the level
    document.querySelector('.input-group-prepend button').disabled = (newLevel <= 1);
    document.querySelector('.input-group-append button').disabled = (document.querySelectorAll('.tree-rtl ul.depth-' + newLevel).length === 0);
    console.log('Disable state:', {
        minusButton: document.querySelector('.input-group-prepend button').disabled,
        plusButton: document.querySelector('.input-group-append button').disabled
    });
}

function updateTreeVisibility(level) {
    document.querySelectorAll('.tree-rtl ul').forEach(ul => {
        let depth = ul.className.match(/depth-(\d+)/);
        if (depth && parseInt(depth[1]) <= level) {
            ul.classList.remove('hidden');
            console.log('Showing:', ul.className);
        } else {
            ul.classList.add('hidden');
            console.log('Hiding:', ul.className);
        }
    });
}
</script>
