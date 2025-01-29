<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Events\MessageSent;

class Message extends Model
{
    use HasFactory;

    const TYPE_EMAIL = 'EMAIL';
    const TYPE_TEXT = 'TEXT';

    const STATUS_QUEUED = 'QUEUED';
    const STATUS_SENT = 'SENT';
    const STATUS_FAILED = 'FAILED';
    const STATUS_DELIVERED = 'DELIVERED';
    const STATUS_READ = 'READ';

    protected $fillable = ['type', 'body', 'status', 'user_id', 'contact_id', 'sent_at', 'delivered_at', 'read_at'];

    protected $dates = ['sent_at', 'delivered_at', 'read_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    // Automatically assign user_id if not provided
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = auth()->id() ?? $value;
    }

    // Status setter with event dispatch and timestamps update
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtoupper($value);

        if ($value === self::STATUS_SENT) {
            $this->attributes['sent_at'] = now();
            event(new MessageSent($this)); // Dispatch event
        } elseif ($value === self::STATUS_DELIVERED) {
            $this->attributes['delivered_at'] = now();
        } elseif ($value === self::STATUS_READ) {
            $this->attributes['read_at'] = now();
        }

        Log::info("Message status updated to: {$value}", ['message_id' => $this->id]);
    }

    // Ensure valid message types
    protected function type(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => in_array(strtoupper($value), [self::TYPE_EMAIL, self::TYPE_TEXT]) ? strtoupper($value) : self::TYPE_TEXT
        );
    }
}
