<x-layout>
        <form method="POST" action="/register">
            @csrf
        <label for="nuserame">Name</label><br>
        <input type="text" id="nusername" name="nusername" required><br>
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Submit">
        </form>
</x-layout>