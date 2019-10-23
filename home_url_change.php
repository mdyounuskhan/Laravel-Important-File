public function authenticated()
{
    if(auth()->user()->hasRole('admin'))
    {
        return redirect('/admin/dashboard');
    } 

    return redirect('/user/dashboard');
}