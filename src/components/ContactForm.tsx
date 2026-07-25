"use client";

import { FormEvent } from "react";
import { t, type Locale } from "@/lib/i18n";
import { whatsappHref } from "@/lib/site";

export function ContactForm({ locale }: { locale: Locale }) {
  function onSubmit(e: FormEvent<HTMLFormElement>) {
    e.preventDefault();
    const form = e.currentTarget;
    const data = new FormData(form);
    const name = String(data.get("name") || "");
    const phone = String(data.get("phone") || "");
    const car = String(data.get("car") || "");
    const message = String(data.get("message") || "");
    const text = `Hello Car Scrap Dubai\nName: ${name}\nPhone: ${phone}\nCar: ${car}${
      message ? `\nMessage: ${message}` : ""
    }`;
    window.open(whatsappHref(text), "_blank", "noopener,noreferrer");
  }

  return (
    <form className="contact-form" onSubmit={onSubmit}>
      <label>
        {t(locale, "form_name")}
        <input type="text" name="name" required autoComplete="name" />
      </label>
      <label>
        {t(locale, "form_phone")}
        <input type="tel" name="phone" required autoComplete="tel" />
      </label>
      <label>
        {t(locale, "form_car")}
        <input type="text" name="car" required />
      </label>
      <label>
        {t(locale, "form_message")}
        <textarea name="message" rows={4} />
      </label>
      <button className="btn btn-green" type="submit">
        {t(locale, "form_submit")}
      </button>
    </form>
  );
}
