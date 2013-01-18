<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ isset($title) ? "$title - " : '' }}High Adventure</title>
</head>
<body>
    <div class="container">
        {{ $content }}
    </div>

    {{ Asset::container('bootstrapper')->styles() }}
    {{ Asset::container('bootstrapper')->scripts() }}
</body>
</html>
