@extends('admin.layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Editar Slide</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('slider.index') }}">Listar</a></div>
              <div class="breadcrumb-item">Editar</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Editar o Slide</h4>
                    <div class="card-header-action">
                        <a href="" class="btn btn-primary">Ajuda?</a>
                    </div>

                  </div>
                  <div class="card-body">
                    <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Capa</label>
                            <br>
                            <img src="{{ asset($slider->banner) }}" alt="{{ $slider->title_one }}" class="img-fluid" style="width: 30%; height:auto;">
                        </div>

                        <div class="form-group">
                            <label for="">Imagem (1300x500px)</label>
                            <input type="file" name="banner" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Titulo 1</label>
                            <input type="text" name="title_one" class="form-control" placeholder="Digite o titulo 1" value="{{ old('title_one', $slider->title_one) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Titulo 2</label>
                            <input type="text" name="title_two" class="form-control" placeholder="Digite o titulo 2" value="{{ old('title_two', $slider->title_two) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Preço</label>
                            <input type="text" name="starting_price" class="form-control" placeholder="Digite o preço" value="{{ old('starting_price', $slider->starting_price) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="url" name="link" class="form-control" placeholder="Digite o link" value="{{ old('link', $slider->link) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Ordem</label>
                            <input type="number" name="serial" class="form-control" placeholder="Digite a ordem de exibição" value="{{ old('serial', $slider->serial) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control" value="{{ old('status') }}">
                                <option value="1" {{ $slider->status == 1 ? 'selected' : null }}>Ativo</option>
                                <option value="0" {{ $slider->status == 0 ? 'selected' : null }}>Inativo</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
