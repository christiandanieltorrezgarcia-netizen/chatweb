namespace ChuchoGramApp;
using Plugin.LocalNotification;

public partial class MainPage : ContentPage
{
    public MainPage()
    {
        InitializeComponent();

        MostrarNotificacion();
    }

    public void MostrarNotificacion()
    {
        var request = new NotificationRequest
        {
            NotificationId = 1,
            Title = "Nuevo mensaje",
            Description = "Tienes un mensaje nuevo",
            Schedule = new NotificationRequestSchedule
            {
                NotifyTime = DateTime.Now.AddSeconds(5)
            }
        };

        LocalNotificationCenter.Current.Show(request);
    }
}