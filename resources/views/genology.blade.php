@extends('layout.layout')
@section('content')

<style> 
    body {
  font-family: Calibri, Segoe, "Segoe UI", "Gill Sans", "Gill Sans MT", sans-serif;
}

/* It's supposed to look like a tree diagram */
.tree, .tree ul, .tree li {
    list-style: none;
    margin: 0;
    padding: 0;
    position: relative;
}

.tree {
    margin: 0 0 1em;
    text-align: center;
}
.tree, .tree ul {
    display: table;
}
.tree ul {
  width: 100%;
}
    .tree li {
        display: table-cell;
        padding: .5em 0;
        vertical-align: top;
    }
        /* _________ */
        .tree li:before {
            outline: solid 1px #666;
            content: "";
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
        }
        .tree li:first-child:before {left: 50%;}
        .tree li:last-child:before {right: 50%;}

        .tree code, .tree span {
            border: solid .1em #666;
            border-radius: .2em;
            display: inline-block;
            margin: 0 .2em .5em;
            padding: .2em .5em;
            position: relative;
        }
        /* If the tree represents DOM structure */
        .tree code {
            font-family: monaco, Consolas, 'Lucida Console', monospace;
        }

            /* | */
            .tree ul:before,
            .tree code:before,
            .tree span:before {
                outline: solid 1px #666;
                content: "";
                height: .5em;
                left: 50%;
                position: absolute;
            }
            .tree ul:before {
                top: -.5em;
            }
            .tree code:before,
            .tree span:before {
                top: -.55em;
            }

/* The root node doesn't connect upwards */
.tree > li {margin-top: 0;}
    .tree > li:before,
    .tree > li:after,
    .tree > li > code:before,
    .tree > li > span:before {
      outline: none;
    }
    a{
        text-decoration: none;
    }
</style>

<div class="container-xl">
    <ul class="tree">
        <li><code>{{ $params['head']->username }}</code>
          <ul>
            @if($params['head']->first_slot != "")
            <li><code><a href="/genology?username={{ $params['head']->first_slot }}">{{ $params['head']->first_slot }}</a></code>
              <ul>
                @if($params['first_slot']->first_slot != "")
                <li><code><a href="/genology?username={{ $params['first_slot']->first_slot }}">{{ $params['first_slot']->first_slot }}</a></code></li>
                @else
                <li><code>Empty</code></li>
                @endif
                @if($params['first_slot']->second_slot != "")
                <li><code><a href="/genology?username={{ $params['first_slot']->second_slot }}">{{ $params['first_slot']->second_slot }}</a></code></li>
                @else
                <li><code>Empty</code></li>
                @endif
                @if($params['first_slot']->third_slot != "")
                <li><code><a href="/genology?username={{ $params['first_slot']->third_slot }}">{{ $params['first_slot']->third_slot }}</a></code></li>
                @else
                <li><code>Empty</code></li>
                @endif
                @if($params['first_slot']->fourth_slot != "")
                <li><code><a href="/genology?username={{ $params['first_slot']->fourth_slot }}">{{ $params['first_slot']->fourth_slot }}</a></code></li>
                @else
                <li><code>Empty</code></li>
                @endif
              </ul>
            </li>
            @else
            <li><code>Empty</code>
                <ul>
                  <li><code>Empty</code></li>
                  <li><code>Empty</code></li>
                  <li><code>Empty</code></li>
                  <li><code>Empty</code></li>
                </ul>
              </li>
            @endif
            @if($params['head']->second_slot != "")
            <li><code><a href="/genology?username={{ $params['head']->second_slot }}">{{ $params['head']->second_slot }}</a></code>
                <ul>
                    @if($params['second_slot']->first_slot != "")
                    <li><code><a href="/genology?username={{ $params['second_slot']->first_slot }}">{{ $params['second_slot']->first_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['second_slot']->second_slot != "")
                    <li><code><a href="/genology?username={{ $params['second_slot']->second_slot }}">{{ $params['second_slot']->second_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['second_slot']->third_slot != "")
                    <li><code><a href="/genology?username={{ $params['second_slot']->third_slot }}">{{ $params['second_slot']->third_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['second_slot']->fourth_slot != "")
                    <li><code><a href="/genology?username={{ $params['second_slot']->fourth_slot }}">{{ $params['second_slot']->fourth_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                </ul>
              </li>
              @else
                <li><code>Empty</code>
                    <ul>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                    </ul>
                </li>
              @endif
              @if($params['head']->third_slot != "")
              <li><code><a href="/genology?username={{ $params['head']->third_slot }}">{{ $params['head']->third_slot }}</a></code>
                <ul>
                    @if($params['third_slot']->first_slot != "")
                    <li><code><a href="/genology?username={{ $params['third_slot']->first_slot }}">{{ $params['third_slot']->first_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['third_slot']->second_slot != "")
                    <li><code><a href="/genology?username={{ $params['third_slot']->second_slot }}">{{ $params['third_slot']->second_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['third_slot']->third_slot != "")
                    <li><code><a href="/genology?username={{ $params['third_slot']->third_slot }}">{{ $params['third_slot']->third_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['third_slot']->fourth_slot != "")
                    <li><code><a href="/genology?username={{ $params['third_slot']->fourth_slot }}">{{ $params['third_slot']->fourth_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                </ul>
              </li>
              @else
                <li><code>Empty</code>
                    <ul>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                    </ul>
                </li>
              @endif
              @if($params['head']->fourth_slot != "")
            <li><code><a href="/genology?username={{ $params['head']->fourth_slot }}">{{ $params['head']->fourth_slot }}</a></code>
              <ul>
                @if($params['fourth_slot']->first_slot != "")
                    <li><code><a href="/genology?username={{ $params['fourth_slot']->first_slot }}">{{ $params['fourth_slot']->first_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['fourth_slot']->second_slot != "")
                    <li><code><a href="/genology?username={{ $params['fourth_slot']->second_slot }}">{{ $params['fourth_slot']->second_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['fourth_slot']->third_slot != "")
                    <li><code><a href="/genology?username={{ $params['fourth_slot']->third_slot }}">{{ $params['fourth_slot']->third_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                    @if($params['fourth_slot']->fourth_slot != "")
                    <li><code><a href="/genology?username={{ $params['fourth_slot']->fourth_slot }}">{{ $params['fourth_slot']->fourth_slot }}</a></code></li>
                    @else
                    <li><code>Empty</code></li>
                    @endif
                </li>
                @else
                <li><code>Empty</code>
                    <ul>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                        <li><code>Empty</code></li>
                    </ul>
                </li>
              @endif
              </ul>
            </li>
          </ul>
        </li>
      </ul>
</div>


@endsection