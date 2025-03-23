<marquee behavior="scroll" direction="left" scrollamount="5">
    @foreach($flashinfos as $flashinfo)
        @if($flashinfo['idType'] == 1)
            <span style="background-color: {{ $flashinfo['couleur'] }}; color: #fff">URGENT : </span>
            {{ Str::limit(strip_tags($flashinfo['corpsTexte']), 200) }}
        @elseif($flashinfo['idType'] == 2)
            <span style="background-color: {{ $flashinfo['couleur'] }}; color: #fff">INFO : </span>
            {{ Str::limit(strip_tags($flashinfo['corpsTexte']), 200) }}
        @elseif($flashinfo['idType'] == 3)
            <span style="background-color: {{ $flashinfo['couleur'] }}; color: #fff">INFO : </span>
            {{ Str::limit(strip_tags($flashinfo['corpsTexte']), 200) }}
        @endif
    @endforeach
</marquee>