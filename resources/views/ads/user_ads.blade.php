@extends('layouts.app')

@section('content')
    <div class="col-lg-8">
        <h2>إعلاناتي</h2>
        @include('alerts.success')
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
                                <form method="POST" action="{{ route('ads.destroy', $ad->id) }}" onsubmit="return confirm('تأكيد الحذف')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-sm btn-danger" type="submit">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
