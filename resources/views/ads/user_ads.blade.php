@extends('layouts.app')

@section('content')
    <div class="col-lg-8">
        <h2>إعلاناتي</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>التاريخ</th>
                    <th>عنوان الإعلان</th>
                    <th>السعر</th>
                    <th>خصائص</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ads as $ad)
                    <tr>
                        <td>{{ $ad->created_at }}</td>
                        <td>{{ $ad->title }}<a href=""></a></td>
                        <td>{{ $ad->price }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn-sm btn-primary" href="{{ route('ads.edit', $ad->id) }}" role="button">تعديل</a>
                                <a class="btn-sm btn-danger" href="" type="submit">حذف</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
