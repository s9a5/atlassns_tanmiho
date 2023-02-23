<form action="{{ route('users.store') }}" method="post">
  @csrf
  <!-- 共通フォームパーツ読み出し -->
  @include('components.form-item')

  <button type="submit">登録する</button>
 </form>