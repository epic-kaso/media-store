<?php

    namespace MediaStore\Services;

    use Mail;
    use Notification;
    use Queue;
    use User;

    class NotificationService
    {

        const TIME_DELAY_SECONDS = 5;

        public function byEmail($view, $data = [], $email, $subject = "PrintRabiit:: Notification")
        {

            Mail::queue($view, $data,
                function ($message) use ($email, $subject) {
                    $message
                        ->from('gate-keeper@printrabbit.net', 'PrintRabbit')
                        ->to($email)
                        ->subject($subject);
                });
        }

        public function bySms($destination, $message)
        {
            $this->queueMessage($destination, $message);
        }

        public function createMerchantPaymentNotification($user, $printjob)
        {
            $user = is_object($user) ? $user : User::find($user);
            $notification = new Notification();
            $notification->subject = 'PrintRabbit: Job Payment Notification';
            $notification->body = "The payment for printing {$printjob->document_name} has been credited to your wallet,
                                but you can't withdraw till we verify the document was indeed printed.";
            $notification->from = 'Team PrintRabbit';
            $notification->user_id = $user->id;
            $notification->priority = 1;
            $notification->save();

            $this->byEmail('emails.default',
                ['useremail' => $user->email, 'body' => $notification->body],
                $user->email, $notification->subject);

            if (isset($user->phone) && !empty($user->phone)) {
                $this->queueMessage($user->phone, $notification->body);
            }
        }
        public function createWelcomeNotification($user, $user_type = 'member')
        {
            $user = is_object($user) ? $user : User::find($user);
            $notification = new Notification();
            $notification->subject = 'Welcome to PrintRabbit';
            $notification->body = 'We, the printrabbit team are glad you decided to join our platform.We promise you an excellent service' .
                ' delivery. If you need assistance simply email admin@printrabbit.net. cheers.';
            $notification->from = 'Team PrintRabbit';
            $notification->user_id = $user->id;
            $notification->priority = 1;
            $notification->save();

            switch ($user_type) {
                case 'merchant':
                    $user_mail_view = 'emails.merchant_welcome';
                    break;
                case 'shipping_partner':
                    $user_mail_view = 'emails.shipping_welcome';
                    break;
                default:
                    $user_mail_view = 'emails.welcome';
                    break;
            }

            $this->byEmail($user_mail_view,
                array('useremail' => $user->email),
                $user->email, 'Welcome to PrintRabbit');

            if (isset($user->phone) && !empty($user->phone)) {
                $this->queueMessage($user->phone, $notification->body);
            }

        }

        public function queueMessage($destination, $message)
        {
            Queue::push('PrintRabbit\Services\SmsHandlerService',
                array('destination' => $destination, 'message' => $message));
        }
    }