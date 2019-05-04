@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-responsive-sm table-striped table-sm">
                        <thead>
                          <tr>
                            <th style="width: 2%">#</th>
                            <th style="width: 55%">Url</th>
                            <th style="width: 20%">Shorten</th>
                            <th style="width: 2%">Hits</th>
                            <th style="width: 15%; text-align: center;">Registration date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $key => $urls)
                            <tr>
                              <td style="width: 2%">{{ ++$i }}</td>
                              <td style="width: 55%">
                                {{ $urls->url }}
                              </td>
                              <td style="width: 20%">
                                {{ $urls->shorten }}
                              </td>
                              <td style="width: 2%">
                                {{ $urls->hits }}
                              </td>
                              <td style="width: 15%" align="center">
                                {{ $urls->created_at->format('d M Y') }}
                              </td>
                            </tr>
                          @endforeach
                          </tr>
                        </tbody>
                    </table>
                    <nav>
                        @if (count($data) == 1)
                            {!! $data->count() !!} url registered
                        @else (count($data) < 1)
                            {!! $data->count() !!} urls of {!! $data->total() !!}
                        @endif
                    </nav>
                    <nav>
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {!! $data->setPath('')->render() !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
