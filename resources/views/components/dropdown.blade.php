@props(['trigger'])

<div x-data="{show:false}" @click.away="show=false">
    <div @click="show = !show">
        {{$trigger}}
    </div>
    {{--Links--}}
    <div x-show="show" class="py-2 overflow-auto max-h-52 absolute bg-gray-100  mt-2 rounded-xl z-50" style="display:none">
           {{$slot}}

    </div>
</div>
