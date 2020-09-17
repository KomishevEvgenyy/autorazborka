<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/*
 * Класс для формирования заказа для отправки на email
 * */
class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $order;
    protected $phone;

    /**
     * OrderCreated constructor.
     * @param $name
     * @param $phone
     * @param Order $order
     */
    public function __construct($name, $phone, Order $order)
    {
        $this->name = $name;
        $this->order = $order;
        $this->phone = $phone;
    }

    /*
     * Метод возвращает представление в которое так же передается данные с конструктора, а так полная сума заказа
     * а так же указывается заголовок письма "Новый заказ с сайта".
     * */
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullSum = $this->order->calculateFullSum();
        return $this->view('mail.order_created', ['name' => $this->name, 'phone'=> $this->phone,
            'order' => $this->order,
            'fullSum' => $fullSum
        ])->subject('Новый заказ с сайта');
    }
}
